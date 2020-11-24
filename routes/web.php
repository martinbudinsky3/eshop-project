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

Route::get('/cart', 'CartController@show');

Route::get('/cart/data/', 'OrderController@create');

Route::get('/cart/sent', 'OrderController@store');

Route::post('/cart/delivery', 'CartController@delivery');

Route::get('/cart/delivery', 'CartController@delivery');


Route::post('/cart-item', 'CartItemController@store');

Route::delete('/cart-delete/{item}', 'CartItemController@destroy');

Auth::routes();
