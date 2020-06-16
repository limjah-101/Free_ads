<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('backend.dashboard');
    }

    public function add_category()
    {
        return view('backend.add_category');
    }

    public function add_product()
    {
        return view('backend.add_product');
    }

    public function add_slider()
    {
        return view('backend.add_slider');
    }

    public function categories()
    {
        return view('backend.categories_list');
    }

    public function products()
    {
        return view('backend.products_list');
    }

    public function sliders()
    {
        return view('backend.sliders_list');
    }
}
