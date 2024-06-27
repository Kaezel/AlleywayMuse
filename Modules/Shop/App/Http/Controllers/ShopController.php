<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShopController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        return view('shop::index');
    }

    /**
     *  Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        return view('shop::create');
    }

    /**
     * Menyimpan resource baru ke storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show($id)
    {
        return view('shop::show');
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit($id)
    {
        return view('shop::edit');
    }

    /**
     * Memperbarui resource yang spesifik di storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Menghapus resource yang spesifik dari storage.
     */
    public function destroy($id)
    {
        //
    }
}
