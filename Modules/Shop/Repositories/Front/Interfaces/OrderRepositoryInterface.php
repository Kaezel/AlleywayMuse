<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

use App\Models\User;
use Modules\Shop\App\Models\Address;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\Order;

interface OrderRepositoryInterface {
    // Membuat order baru untuk user, cart, dan address
    public function create(User $user, Cart $cart, Address $address) : Order;

    // Mencari order berdasarkan ID
    public function findbyID(string $id);
}