<?php

namespace Modules\Shop\Repositories\Front;

use App\Models\User;
use Modules\Shop\App\Models\Address;
use Modules\Shop\Repositories\Front\Interfaces\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface{

    public function findByUser(User $user)
    {
        // Mengambil semua data alamat yang terkait dengan user yang diberikan
        return Address::where('user_id', $user->id)->get();
    }

    public function findByID(string $id)
    {
        // Mengambil data alamat berdasarkan ID yang diberikan dan mengembalikan hasilnya dalam bentuk objek
        return Address::findOrFail($id);
    }
}