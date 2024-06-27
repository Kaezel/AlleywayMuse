<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// ROUTES ADMIN USER
Route::get('/admin/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
Route::get('/admin/create/user', [App\Http\Controllers\HomeController::class, 'createUser'])->name('user.create');
Route::post('/admin/store/user', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('user.store');
Route::get('/admin/edit/user/{id}', [App\Http\Controllers\HomeController::class, 'editUser'])->name('user.edit');
Route::put('/admin/update/user/{id}', [App\Http\Controllers\HomeController::class, 'updateUser'])->name('user.update');
Route::delete('/admin/delete/user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('user.delete');

// ROUTES ADMIN PRODUCT
Route::get('/admin/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/admin/create/product', [App\Http\Controllers\HomeController::class, 'createProduct'])->name('product.create');
Route::post('/admin/store/product', [App\Http\Controllers\HomeController::class, 'storeProduct'])->name('product.store');
Route::get('/admin/edit/product/{id}', [App\Http\Controllers\HomeController::class, 'editProduct'])->name('product.edit');
Route::put('/admin/update/product/{id}', [App\Http\Controllers\HomeController::class, 'updateProduct'])->name('product.update');
Route::delete('/admin/delete/product/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct'])->name('product.delete');

// ROUTES ADMIN CATEGORY
Route::get('/admin/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/admin/create/category', [App\Http\Controllers\HomeController::class, 'createCategory'])->name('category.create');
Route::post('/admin/store/category', [App\Http\Controllers\HomeController::class, 'storeCategory'])->name('category.store');
Route::get('/admin/edit/category/{id}', [App\Http\Controllers\HomeController::class, 'editCategory'])->name('category.edit');
Route::put('/admin/update/category/{id}', [App\Http\Controllers\HomeController::class, 'updateCategory'])->name('category.update');
Route::delete('/admin/delete/category/{id}', [App\Http\Controllers\HomeController::class, 'deleteCategory'])->name('category.delete');

// ROUTES ADMIN CATEGORY PRODUCT
Route::get('/admin/categoryproduct', [App\Http\Controllers\HomeController::class, 'categoryProduct'])->name('categoryproduct');
Route::get('/admin/create/categoryproduct', [App\Http\Controllers\HomeController::class, 'createCategoryProduct'])->name('categoryproduct.create');
Route::post('/admin/store/categoryproduct', [App\Http\Controllers\HomeController::class, 'storeCategoryProduct'])->name('categoryproduct.store');
Route::get('/admin/edit/categoryproduct/{product_id}/{category_id}', [App\Http\Controllers\HomeController::class, 'editCategoryProduct'])->name('categoryproduct.edit');
Route::put('/admin/update/categoryproduct/{product_id}/{category_id}', [App\Http\Controllers\HomeController::class, 'updateCategoryProduct'])->name('categoryproduct.update');
Route::delete('/admin/delete/categoryproduct/{product_id}/{category_id}', [App\Http\Controllers\HomeController::class, 'deleteCategoryProduct'])->name('categoryproduct.delete');

// ROUTES ADMIN ADDRESS
Route::get('/admin/address', [App\Http\Controllers\HomeController::class, 'address'])->name('address');
Route::get('/admin/edit/address/{id}', [App\Http\Controllers\HomeController::class, 'editAddress'])->name('address.edit');
Route::put('/admin/update/address/{id}', [App\Http\Controllers\HomeController::class, 'updateAddress'])->name('address.update');
Route::delete('/admin/delete/address/{id}', [App\Http\Controllers\HomeController::class, 'deleteAddress'])->name('address.delete');

// ROUTES ADMIN PRODUCT INVENTORY
Route::get('/admin/productinventory', [App\Http\Controllers\HomeController::class, 'productInventory'])->name('productinventory');
Route::get('/admin/create/productinventory', [App\Http\Controllers\HomeController::class, 'createProductInventory'])->name('productinventory.create');
Route::post('/admin/store/productinventory', [App\Http\Controllers\HomeController::class, 'storeProductInventory'])->name('productinventory.store');
Route::get('/admin/edit/productinventory/{id}', [App\Http\Controllers\HomeController::class, 'editProductInventory'])->name('productinventory.edit');
Route::put('/admin/update/productinventory/{id}', [App\Http\Controllers\HomeController::class, 'updateProductInventory'])->name('productinventory.update');
Route::delete('/admin/delete/productinventory/{id}', [App\Http\Controllers\HomeController::class, 'deleteProductInventory'])->name('productinventory.delete');

// ROUTES HOME PAGE
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
