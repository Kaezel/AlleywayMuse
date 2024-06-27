<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\Shop\Repositories\Front\Interfaces\CartRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;


use Modules\Shop\App\Models\Product;

class CartController extends Controller
{
    protected $cartRepository;
    protected $productRepository;

    // Constructor untuk menginisialisasi repository yang digunakan
    public function __construct(CartRepositoryInterface $cartRepository, ProductRepositoryInterface $productRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }
    
    // Method untuk menampilkan daftar produk di keranjang
    public function index()
    {
        $cart = $this->cartRepository->findByUser(auth()->user());
        
        $this->data['cart'] = $cart;
        return $this->loadTheme('carts.index', $this->data);
    }

    // Method untuk menghitung jumlah produk di keranjang
    public function getItemCount()
    {
        $itemCount = $this->cartRepository->countItems(auth()->user());
        return view('themes.alleywayMuse.shared.header', compact('itemCount'));
    }

    // Method untuk menampilkan form pembuatan resource baru
    public function create()
    {
        return view('shop::create');
    }

    // Method untuk menyimpan resource baru ke storage
    public function store(Request $request)
    {
        $productID = $request->get('product_id');
        $qty = $request->get('qty');
        
        $product = $this->productRepository->findByID($productID);

        if ($product->stock_status != Product::STATUS_IN_STOCK) {
            return redirect(shop_product_link($product))->with('error', 'Tidak ada stok produk');
        }

        if ($product->stock < $qty) {
            return redirect(shop_product_link($product))->with('error', 'Stok produk tidak mencukupi');
        }

        $item = $this->cartRepository->addItem($product, $qty);
        if (!$item) {
            return redirect(shop_product_link($product))->with('error', 'Tidak dapat menambahkan item ke keranjang');
        }

        return redirect(shop_product_link($product))->with('success', 'Berhasil menambahkan item ke keranjang');
    }

    // Method untuk menampilkan resource yang ditentukan
    public function show($id)
    {
        return view('shop::show');
    }

    // Method untuk menampilkan form pengeditan resource yang ditentukan
    public function edit($id)
    {
        return view('shop::edit');
    }

    // Method untuk memperbarui resource yang ditentukan di storage
    public function update(Request $request)
    {
        $items = $request->get('qty');
        $this->cartRepository->updateQty($items);

        return redirect(route('carts.index'))->with('success', 'Keranjang telah diperbaharui');
    }

    // Method untuk menghapus resource yang ditentukan dari storage
    public function destroy($id)
    {
        $this->cartRepository->removeItem($id);

        return redirect(route('carts.index'))->with('success', 'Berhasil menghapus item dari keranjang');
    }
}
