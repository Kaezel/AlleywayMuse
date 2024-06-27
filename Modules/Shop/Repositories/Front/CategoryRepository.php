<?php

namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Category;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface{

    // Mengambil semua data kategori dan mengurutkannya berdasarkan nama dalam urutan ascending
    public function findAll($options = [])
    {
        return Category::orderBy('name','asc')->get();
    }

    // Mengambil data kategori berdasarkan slug yang diberikan dan mengembalikan hasilnya dalam bentuk objek
    public function findBySlug($slug)
    {
        return Category::where('slug', $slug)->firstOrFail();
    }
}