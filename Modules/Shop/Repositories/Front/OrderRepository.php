<?php

namespace Modules\Shop\Repositories\Front;

use App\Models\User;
use Carbon\Carbon;
use Modules\Shop\App\Models\Address;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Order;
use Modules\Shop\App\Models\OrderItem;
use Modules\Shop\Repositories\Front\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    // Mengambil order berdasarkan ID-nya
    public function findByID(string $id)
    {
        return Order::findOrFail($id);
    }

    // Membuat order baru dengan data user, cart, dan address
    public function create(User $user, Cart $cart, Address $address) : Order
    {
        // Menyiapkan parameter order dengan data user, cart, dan address
        $orderParams = $this->prepareOrderParams($user, $cart, $address);
        
        // Membuat order baru dengan parameter yang telah disiapkan
        $order = Order::create($orderParams);
        
        // Menyimpan item-item order ke dalam database
        $order->items()->saveMany($orderParams['items']);
        
        // Menyimpan order ke dalam database
        $order->save();

        return $order;
    }

    // Menyiapkan parameter order dengan data user, cart, dan address
    private function prepareOrderParams(User $user, Cart $cart, Address $address)
    {
        // Membuat tanggal order dan tanggal jatuh tempo pembayaran
        $orderDate = Carbon::now();
        $paymentDue = $orderDate->addDay();
        
        // Menghitung total harga order
        $grandTotal = $cart->grand_total;
        
        // Menyiapkan parameter order
        $params = [
            'user_id' => $user->id,
            'code' => Order::generateCode(),
            'status' => Order::STATUS_PENDING,
            'order_date' => $orderDate,
            'payment_due' => $paymentDue,
            'base_total_price' => $cart->base_total_price,
            'tax_amount' => $cart->tax_amount,
            'tax_percent' => $cart->tax_percent,
            'discount_amount' => $cart->discount_amount,
            'discount_percent' => $cart->discount_percent,
            'grand_total' => $grandTotal,
            'customer_first_name' => $address->first_name,
            'customer_last_name' => $address->last_name,
            'customer_address1' => $address->address1,
            'customer_address2' => $address->address2,
            'customer_phone' => $address->phone,
            'customer_email' => $address->email,
            'customer_city' => $address->city,
            'customer_province' => $address->province,
            'customer_postcode' => $address->postcode,
        ];
        
        // Menyiapkan item-item order
        $items = [];
        if ($cart->items->count() > 0) {
            foreach ($cart->items as $item) {
                // Menghitung harga dan diskon item
                $itemBasePrice = $item->product->price;
                $itemSalePrice = $item->product->sale_price;
                $itemPrice = ($itemSalePrice > 0)? $itemSalePrice : $itemBasePrice;
                $itemDiscountAmount = $itemBasePrice - $itemSalePrice;
                $itemDiscountPercent = ($itemDiscountAmount / $itemBasePrice) * 100;
                $itemTaxPercent = $cart->tax_percent;
                $itemTaxAmount = $itemPrice * $itemTaxPercent;
                $itemSubTotal = $itemPrice * $item->qty;
                
                // Menyiapkan item order
                $items[] = new OrderItem([
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'base_price' => $itemBasePrice,
                    'base_total' => $itemBasePrice * $item->qty,
                    'tax_amount' => $itemTaxAmount,
                    'tax_percent' => $itemTaxPercent,
                    'discount_amount' => $itemDiscountAmount,
                    'discount_percent' => $itemDiscountPercent,
                    'sub_total' => $itemSubTotal,
                    'sku' => $item->product->sku,
                    'type' => $item->product->type,
                    'name' => $item->product->name,
                    'attributes' => '{}',
                ]);
            }
        }
        
        // Menambahkan item-item order ke dalam parameter order
        $params['items'] = $items;

        return $params;
    }
}