<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Shop\Repositories\Front\Interfaces\AddressRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\CartRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    protected $addressRepository;
    protected $cartRepository;
    protected $orderRepository;

    // Constructor utk menginisialisasi repository yang dibutuhkan
    public function __construct(AddressRepositoryInterface $addressRepository, CartRepositoryInterface $cartRepository, OrderRepositoryInterface $orderRepository) 
    {
        $this->addressRepository = $addressRepository;
        $this->cartRepository = $cartRepository;
        $this->orderRepository = $orderRepository;
    }

    // Method untuk menampilkan halaman checkout
    public function checkout() 
    {
        $this->data['cart'] = $this->cartRepository->findByUser(auth()->user());
        $this->data['addresses'] = $this->addressRepository->findByUser(auth()->user());
        return $this->loadTheme('orders.checkout', $this->data);
    }

    // Method untuk menyimpan order baru
    public function store(Request $request)
    {
        $address = $this->addressRepository->findByID($request->get('address_id'));
        $cart = $this->cartRepository->findByUser(auth()->user());

        DB::beginTransaction();
        try {
            // Membuat order baru
            $order = $this->orderRepository->create($request->user(), $cart, $address);
            $order->courier_name = $request->get('courier_name');
            $order->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return view('themes.alleywayMuse.orders.payment', ['order' => $order]);
    }
    
    // Method untuk menandai order sebagai sudah dibayar
    public function markAsPaid(Request $request, $orderId)
    {
        $order = $this->orderRepository->findByID($orderId);

        if (!$order) {
            return redirect()->back()->withErrors('Order not found.');
        }

        DB::beginTransaction();
        try {
            // Update order status
            $order->status = 'CONFIRMED';
            $order->save();

            // Clear the cart
            $this->cartRepository->clear(auth()->user());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Failed to process payment.');
        }

        return redirect(url('/'))->with('status', 'Order confirmed and cart cleared.');
    }
}
