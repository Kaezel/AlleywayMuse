<?php

namespace Modules\Shop\Repositories\Front;

use App\Models\User;
use Carbon\Carbon;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\CartItem;
use Modules\Shop\Repositories\Front\Interfaces\CartRepositoryInterface;

class CartRepository implements CartRepositoryInterface{

    // Mencari cart berdasarkan user yang diberikan
    // Jika cart tidak ditemukan, maka akan membuat cart baru
    public function findByUser(User $user): ?Cart
    {
        $cart = Cart::with([
                'items',
                'items.product',
            ])
            ->where('user_id', $user->id)
            ->first();
        
        if (!$cart) {
            $taxPercent = env('TAX_PERCENT', 10) / 100;
            return Cart::create([
                'user_id' => $user->id,
                'expired_at' => (new Carbon())->addDay(7),
                'tax_percent' => $taxPercent,
            ]);
        }

        $this->calculateCart($cart);

        return $cart;
    }

    // Menghitung jumlah item dalam cart berdasarkan user yang diberikan
    public function countItems(User $user): int
    {
        $cart = $this->findByUser($user);
        return $cart ? $cart->items()->count() : 0;
    }

    // Menambahkan item ke dalam cart
    // Jika item sudah ada dalam cart, maka akan menambahkan quantity
    public function addItem($product, $qty): CartItem
    {
        $cart = $this->findByUser(auth()->user());
        
        $existItem = CartItem::where([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ])->first();
        
        if (!$existItem) {
            return CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'qty' => $qty,
            ]);
        }

        if (($existItem->qty + $qty) > $product->stock) {
            return new CartItem();
        }

        $existItem->qty = $existItem->qty + $qty;
        $existItem->save();

        return $existItem;
    }

    // Menghapus item dari cart
    public function removeItem($id) : bool
    {
        return CartItem::where('id', $id)->delete();
    }

    // Menghapus semua item dari cart berdasarkan user yang diberikan
    public function clear(User $user) : void
    {
        Cart::forUser($user)->delete();
    }

    // Mengupdate quantity item dalam cart
    public function updateQty($items = []): void
    {
        if (!empty($items)) {
            foreach ($items as $itemID => $qty) {
                $item = CartItem::where('id', $itemID)->first();
                if ($item) {
                    $item->qty = $qty;
                    $item->save();
                }
            }
        }
    }

    // Menghitung total harga, diskon, pajak, dan berat dalam cart
    private function calculateCart(Cart $cart): void
    {
        $baseTotalPrice = 0;
        $taxAmount = 0;
        $discountAmount = 0;
        $discountPercent = 0;
        $grandTotal = 0;
        $totalWeight = 0;

        if (count($cart->items) > 0) {
            foreach ($cart->items as $item) {
                $baseTotalPrice += $item->qty * $item->product->price;

                if ($item->product->has_sale_price) {
                    $discountAmountItem = $item->product->price - $item->product->sale_price;
                    $discountAmount += $item->qty * $discountAmountItem;
                }

                $totalWeight += ($item->qty * $item->product->weight);
            }
        }

        $nettTotal = $baseTotalPrice - $discountAmount;
        $taxPercent = env('TAX_PERCENT', 10) / 100; // Ensure we fetch the tax percent again
        $taxAmount = $taxPercent * $nettTotal;
        $grandTotal = $nettTotal + $taxAmount;
        if ($baseTotalPrice) {
            $discountPercent = ($discountAmount / $baseTotalPrice) * 100;
        }

        $cart->update([
            'base_total_price' => $baseTotalPrice,
            'tax_amount' => $taxAmount,
            'discount_amount' => $discountAmount,
            'discount_percent' => $discountPercent,
            'grand_total' => $grandTotal,
            'total_weight' => $totalWeight,
            'tax_percent' => $taxPercent,
        ]);
    }
}