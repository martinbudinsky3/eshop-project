<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests;
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

Route::get('/', 'IndexController@index');

Route::get('/product-detail', 'ProductController@index');

Route::get('/product-detail/{product}', 'ProductController@show');

Route::get('category/{category}', 'CategoryController@show');

Route::get('category', 'CategoryController@index');

Route::get('/cart', 'CartController@show');

Route::put('/cart-update/{id}', 'CartController@update');

Route::get('/cart/data/', 'OrderController@create');

Route::get('/cart/sent', 'OrderController@store');

Route::get('/cart/delivery', 'CartController@delivery');

Route::post('/cart-item', 'CartItemController@store');

Route::delete('/cart-delete/{item}', 'CartItemController@destroy');

Route::get('/cart/login', 'CartController@login');

Route::get('products/list/{page}', 'ProductController@list');

Route::delete('products/{product}', 'ProductController@destroy');

Route::post('products/', 'ProductController@store');

Route::get('products/{product}/edit', 'ProductController@edit');

Route::put('products/{product}', 'ProductController@update');

Route::get('/brand', 'BrandController@index');

Route::get('/color', 'ColorController@index');

Route::get('/size', 'SizeController@index');

Route::post('/image', 'ImageController@store');

Route::get('/image/{product}', 'ImageController@show');

Route::get('/admin', 'AdminController@index');

Route::get('/user', 'UserController@index');

Auth::routes();
