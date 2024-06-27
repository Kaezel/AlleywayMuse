<?php

// Fungsi untuk menghasilkan link produk shop
if (!function_exists('shop_product_link')) {
    function shop_product_link($product) {
        // Slug kategori default adalah 'produk'
        $categorySlug = 'produk';

        // Jika produk memiliki kategori, maka ambil slug kategori pertama
        if ($product->categories->count() > 0) {
            $categorySlug = $product->categories->first()->slug;
        }

        // Buat slug produk dengan format {slug}-{sku}
        $productSlug = $product->slug . '-' . $product->sku;

        return route('products.show', [$categorySlug, $productSlug]);
    }
}

// Fungsi untuk menghasilkan link kategori shop
if (!function_exists('shop_category_link')){
    function shop_category_link($category) {
        return route('products.category', [$category->slug]);
    }
}