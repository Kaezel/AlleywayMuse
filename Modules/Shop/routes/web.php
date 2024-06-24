<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Shop\App\Http\Controllers\AddressController;
use Modules\Shop\App\Http\Controllers\CartController;
use Modules\Shop\App\Http\Controllers\OrderController;
use Modules\Shop\App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{categorySlug}', [ProductController::class, 'category'])->name('products.category');
Route::get('/tag/{tagSlug}', [ProductController::class, 'tag'])->name('products.tag');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::middleware(['auth'])->group(function() {
    Route::get('orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/payment', [OrderController::class, 'payment'])->name('orders.payment');
    Route::post('orders/mark-as-paid/{orderId}', [OrderController::class, 'markAsPaid'])->name('orders.markAsPaid');

    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::get('/carts/{id}/remove', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::put('/carts', [CartController::class, 'update'])->name('carts.update');

    Route::get('addresses/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::post('addresses/store', [AddressController::class, 'store'])->name('addresses.store');
    Route::get('addresses/{id}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::put('addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('addresses/{id}/delete', [AddressController::class, 'delete'])->name('addresses.delete');
});

Route::get('/{categorySlug}/{productSlug}', [ProductController::class, 'show'])->name('products.show');