<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

use App\Models\User;

interface AddressRepositoryInterface
{
    // Mencari alamat berdasarkan user
    public function findByUser(User $user);

    // Mencari alamat berdasarkan ID
    public function findbyID(string $id);
}