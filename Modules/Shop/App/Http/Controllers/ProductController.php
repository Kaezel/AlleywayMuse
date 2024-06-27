<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\TagRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $defaultPriceRange;
    protected $sortingQuery;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, TagRepositoryInterface $tagRepository)
    {
        parent::__construct();

        // Menginisialisasi repository utk produk, kategori, dan tag
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;

        // Mengatur rentang harga slider default
        $this->defaultPriceRange = [
            'min' => 20000,
            'max' => 50000,
        ];

        // Mengambil semua kategori dan mengatur filter harga
        $this->data['categories'] = $this->categoryRepository->findAll();
        $this->data['filter']['price'] = $this->defaultPriceRange;

        // Mengatur query penyortiran
        $this->sortingQuery = null;
        $this->data['sortingQuery'] = $this->sortingQuery;
        $this->data['sortingOptions'] = [
            '' => '-- Sort Products --',
            '?sort=price&order=asc' => 'Price: Low to High',
            '?sort=price&order=desc' => 'Price: High to Low',
            '?sort=publish_date&order=desc' => 'Newest Item',
        ];
    }

    public function index(Request $request)
    {
        // Mengatur filter harga berdasarkan permintaan
        $priceFilter = $this->getPriceRangeFilter($request);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'price' => $priceFilter,
            ],
        ];

        // Mengatur filter harga jika ada dalam permintaan
        if ($request->get('price')) {
            $this->data['filter']['price'] = $priceFilter;
        }

        // Mengatur penyortiran jika ada dalam permintaan
        if ($request->get('sort')) {
            $sort = $this->sortingRequest($request);
            $options['sort'] = $sort;

            $this->sortingQuery = '?sort=' . $sort['sort'] . '&order=' . $sort['order'];
            
            $this->data['sortingQuery'] = $this->sortingQuery;
        }
        
        // Mengambil semua produk berdasarkan opsi yang telah diatur
        $this->data['products'] = $this->productRepository->findAll($options);
        
        return $this->loadTheme('products.index', $this->data);
    }

    public function category($categorySlug, Request $request)
    {
        // Mengambil kategori berdasarkan slug
        $category = $this->categoryRepository->findBySlug($categorySlug);
        
        // Mengatur filter harga berdasarkan permintaan
        $priceFilter = $this->getPriceRangeFilter($request);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'category' => $categorySlug,
                'price' => $priceFilter,
            ]
        ];

        // Mengatur filter harga jika ada dalam permintaan
        if ($request->get('price')) {
            $this->data['filter']['price'] = $priceFilter;
        }

        // Mengatur penyortiran jika ada dalam permintaan
        if ($request->get('sort')) {
            $sort = $this->sortingRequest($request);
            $options['sort'] = $sort;

            $this->sortingQuery = '?sort=' . $sort['sort'] . '&order=' . $sort['order'];
            
            $this->data['sortingQuery'] = $this->sortingQuery;
        }

        // Mengambil semua produk berdasarkan opsi yang telah diatur
        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['category'] = $category;

        return $this->loadTheme('products.category', $this->data);
    }

    public function tag($tagSlug)
    {
        // Mengambil tag berdasarkan slug
        $tag = $this->tagRepository->findBySlug($tagSlug);
        
        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'tag' => $tagSlug,
            ]
        ];

        // Mengambil semua produk berdasarkan tag
        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['tag'] = $tag;

        return $this->loadTheme('products.tag', $this->data);
    }

    public function show($categorySlug, $productSlug)
    {
        // Mengambil SKU produk dari slug
        $sku = Arr::last(explode('-', $productSlug));
        
        // Mengambil kategori dan produk berdasarkan slug
        $category = $this->categoryRepository->findBySlug($categorySlug);
        $product = $this->productRepository->findBySKU($sku);

        // Mengatur data produk dan kategori
        $this->data['product'] = $product;
        $this->data['category'] = $category;

        return $this->loadTheme('products.show', $this->data);
    }

    // Mengatur filter harga berdasarkan permintaan
    function getPriceRangeFilter($request)
    {
        if (!$request->get('price')) {
            return [];
        }

        $prices = explode(' - ', $request->get('price'));
        if (count($prices) < 0) {
            return $this->defaultPriceRange;
        }

        return [
            'min' => (int) $prices[0],
            'max' => (int) $prices[1],
        ];
    }

    // Mengatur parameter penyortiran berdasarkan permintaan
    function sortingRequest(Request $request) {
        $sort = [];

        if ($request->get('sort') && $request->get('order')) {
            $sort = [
                'sort' => $request->get('sort'),
                'order' => $request->get('order'),
            ];
        } else if ($request->get('sort')) {
            $sort = [
                'sort' => $request->get('sort'),
                'order' => 'desc',
            ];
        }

        return $sort;
    }

    public function search(Request $request)
    {
        // Mengambil query pencarian dari permintaan
        $query = $request->input('query');
        
        // Mengatur filter harga berdasarkan permintaan
        $priceFilter = $this->getPriceRangeFilter($request);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'search' => $query,
                'price' => $priceFilter,
            ]
        ];

        // Mengatur filter harga jika ada dalam permintaan
        if ($request->get('price')) {
            $this->data['filter']['price'] = $priceFilter;
        }

        // Mengatur penyortiran jika ada dalam permintaan
        if ($request->get('sort')) {
            $sort = $this->sortingRequest($request);
            $options['sort'] = $sort;

            $this->sortingQuery = '?sort=' . $sort['sort'] . '&order=' . $sort['order'];
            $this->data['sortingQuery'] = $this->sortingQuery;
        }

        // Mengambil semua produk berdasarkan query pencarian dan filter yang telah diatur
        $products = $this->productRepository->findAll($options);
        $resultCount = $products->total();
        $categories = Category::all();

        // Mengatur data produk, query, dan hasil pencarian
        $this->data['products'] = $products;
        $this->data['query'] = $query;
        $this->data['resultCount'] = $resultCount;
        $this->data['categories'] = $categories;

        return $this->loadTheme('products.search', $this->data);
    }
}