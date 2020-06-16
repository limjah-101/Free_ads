<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//RENDER CLIENT VIEWS
Route::get('/', 'ClientController@index');
Route::get('/shop', 'ClientController@shop');
Route::get('/cart', 'ClientController@cart');
Route::get('/checkout', 'ClientController@checkout');

//RENDER ADMIN VIEWS
Route::get('/admin', 'AdminController@index');
Route::get('/admin/add-category', 'AdminController@add_category');
Route::get('/admin/add-product', 'AdminController@add_product');
Route::get('/admin/add-slider', 'AdminController@add_slider');
Route::get('/admin/categories', 'AdminController@categories');
Route::get('/admin/products', 'AdminController@products');
Route::get('/admin/sliders', 'AdminController@sliders');

// CATEGORIES
Route::post('/add-category', 'CategoryController@create');
Route::get('/admin/delete-category/{id}', 'CategoryController@delete');

Route::get('/admin/edit-category/{id?}', 'CategoryController@edit');
Route::post('/admin/edit-category/{id?}', 'CategoryController@update');

// PRODUCTS
Route::post('/add-product', 'ProductController@create');
Route::get('/product/{category}', 'ProductController@productByCategory');
Route::get('/admin/product-on/{id}', 'ProductController@turnProductOn');
Route::get('/admin/product-off/{id}', 'ProductController@turnProductOff');
Route::get('/admin/delete-product/{id}', 'ProductController@delete');
Route::get('/admin/edit-product/{id?}', 'ProductController@edit');
Route::post('/admin/edit-product/{id?}', 'ProductController@update');


// SLIDERS
Route::post('/add-slider', 'SliderController@create');
Route::get('/admin/slider-on/{id}', 'SliderController@turnSliderOn');
Route::get('/admin/slider-off/{id}', 'SliderController@turnSliderOff');
Route::get('/admin/delete-slider/{id}', 'SliderController@delete');

