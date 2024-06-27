<?php

namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Tag;
use Modules\Shop\Repositories\Front\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface{

    public function findAll($options = [])
    {
        // Mengambil semua data tag dan mengurutkannya berdasarkan nama dalam urutan ascending
        return Tag::orderBy('name','asc')->get();
    }

    public function findBySlug($slug)
    {
        // Mengambil data tag berdasarkan slug yang diberikan dan mengembalikan hasilnya dalam bentuk objek
        return Tag::where('slug', $slug)->firstOrFail();
    }
}