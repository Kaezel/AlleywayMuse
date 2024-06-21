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
    public function findByID(string $id)
    {
        return Order::findOrFail($id);
    }

    public function create(User $user, Cart $cart, Address $address) : Order
    {
        $orderParams = $this->prepareOrderParams($user, $cart, $address);
        $order = Order::create($orderParams);
        $order->items()->saveMany($orderParams['items']);

        $order->save();

        return $order;
    }

    private function prepareOrderParams(User $user, Cart $cart, Address $address)
    {
        $orderDate = Carbon::now();
        $paymentDue = $orderDate->addDay();

        $grandTotal = $cart->grand_total;

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

        $items = [];
        if ($cart->items->count() > 0) {
            foreach ($cart->items as $item) {
                $itemBasePrice = $item->product->price;
                $itemSalePrice = $item->product->sale_price;
                $itemPrice = ($itemSalePrice > 0) ? $itemSalePrice : $itemBasePrice;
                $itemDiscountAmount = $itemBasePrice - $itemSalePrice;
                $itemDiscountPercent = ($itemDiscountAmount / $itemBasePrice) * 100;
                $itemTaxPercent = $cart->tax_percent;
                $itemTaxAmount = $itemPrice * $itemTaxPercent;
                $itemSubTotal = $itemPrice * $item->qty;

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

        $params['items'] = $items;

        return $params;
    }
}