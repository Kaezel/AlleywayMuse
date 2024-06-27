<?php

namespace Modules\Shop\Repositories\Front\Interfaces;

interface TagRepositoryInterface
{
    // Mencari semua tag dengan opsi tertentu
    public function findAll($options = []);
    
    // Mencari tag berdasarkan slug
    public function findBySlug($slug);
}