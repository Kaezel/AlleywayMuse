<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $data = [];
    protected $perPage = 8;

    public function __construct()
    {

    }

    // Metode untuk memuat tema tampilan
    protected function loadTheme($view, $data = [])
    {
        // Mengembalikan tampilan dengan tema yang diatur dalam .env
        // atau tema 'default' jika tidak ada tema yang diatur
        return view('themes/'. env('APP_THEME', 'default') . '/' . $view , $data); 
    }
}
