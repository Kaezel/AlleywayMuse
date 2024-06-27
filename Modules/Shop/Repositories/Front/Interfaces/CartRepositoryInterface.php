<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

use App\Models\User;
use Modules\Shop\App\Models\Cart;
use Modules\Shop\App\Models\CartItem;
use Modules\Shop\App\Models\Product;

interface CartRepositoryInterface
{
    // Mencari cart berdasarkan user
    public function findByUser(User $user): ?Cart;

    // Menambahkan item ke cart
    public function addItem(Product $product, $qty): CartItem;

    // Menghapus item dari cart
    public function removeItem($id): bool;

    // Memperbarui qty item di cart
    public function updateQty($items = []): void;

    // Mengosongkan cart untuk user
    public function clear(User $user): void;

    // Menghitung jumlah item di cart untuk user
    public function countItems(User $user): int;
}