<?php

namespace Modules\Shop\Repositories\Front;

use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\Tag;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    // Mendapatkan semua produk dari database, dengan filter dan sorting yang dapat diatur
    public function findAll($options = [])
    {
        // Mengambil opsi pagination, filter, dan sorting dari array $options
        $perPage = $options['per_page'] ?? null;
        $categorySlug = $options['filter']['category'] ?? null;
        $tagSlug = $options['filter']['tag'] ?? null;
        $priceFilter = $options['filter']['price'] ?? null;
        $sort = $options['sort'] ?? null;
        $searchQuery = $options['filter']['search'] ?? null;

        // Mengambil produk dengan eager loading categories dan tags
        $products = Product::with(['categories', 'tags']);

        // Filter by category
        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $childCategoryIDs = Category::childIDs($category->id);

            $categoryIDs = array_merge([$category->id], $childCategoryIDs);

            $products = $products->whereHas('categories', function ($query) use ($categoryIDs){
                $query->whereIn('shop_categories.id', $categoryIDs);
            });
        }

        // Filter by tag
        if ($tagSlug){
            $tag = Tag::where('slug', $tagSlug)->firstOrFail();

            $products = $products->whereHas('tags', function ($query) use($tag){
                $query->where('shop_tags.id', $tag->id);
            });
        }

        // Filter by price
        if ($priceFilter) {
            $products = $products->where('price', '>=', $priceFilter['min'])
                ->where('price', '<=', $priceFilter['max']);
        }

        // Sorting produk
        if ($sort) {
            $products = $products->orderBy($sort['sort'], $sort['order']);
        }

        // Filter by search query
        if ($searchQuery) {
            $products = $products->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($searchQuery) . '%']);
        }

        // Pagination
        if ($perPage) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }

    // Mendapatkan produk berdasarkan SKU, atau mengembalikan exception jika tidak ditemukan
    public function findBySKU($sku)
    {
        return Product::where('sku', $sku)->firstOrFail();
    }

    // Mengambil produk berdasarkan ID-nya, atau mengembalikan exception jika tidak ditemukan
    public function findByID($id)
    {
        return Product::where('id', $id)->firstOrFail();
    }
}