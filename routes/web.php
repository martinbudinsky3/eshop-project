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

Route::get('/', function () {
    return view('index');
});

Route::get('/product-detail', 'ProductController@index');

Route::get('/product-detail/{product}', 'ProductController@show');

Route::get('category/{category}', 'CategoryController@show');

Route::get('/cart/{cart}', 'CartController@show')->name('cart');

Route::post('/cart-item/{product}', 'CartItemController@store');

Route::delete('/cart-delete/{item}', 'CartItemController@destroy');

Auth::routes();
