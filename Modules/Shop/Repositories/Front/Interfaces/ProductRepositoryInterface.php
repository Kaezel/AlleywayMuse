<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

interface ProductRepositoryInterface
{
    // Mencari semua produk dengan opsi tertentu
    public function findAll($options = []);

    // Mencari produk berdasarkan SKU
    public function findBySKU($sku);

    // Mencari produk berdasarkan ID
    public function findByID($id);
}