<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

interface CategoryRepositoryInterface
{
    // Mencari semua kategori dengan opsi tertentu
    public function findAll($options = []);

    // Mencari kategori berdasarkan slug
    public function findBySlug($slug);
}