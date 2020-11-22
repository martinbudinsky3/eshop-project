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

Route::get('/product-category', function () {
    return view('templates.product-category');
})->name('product-category');


Route::get('/product-detail/{product}', 'ProductController@show')->name('product-detail');
Route::get('category/{category}', 'CategoryController@show');

Route::get('/cart/{cart}', 'CartController@show')->name('cart');

Route::post('/cart-item/{product}', 'CartItemController@store');

Route::delete('/cart-delete/{item}', 'CartItemController@destroy');


Route::get('/albums','ProductController@index');

Route::get('/cart', function () {
    return view('templates.cart');
});

Route::get('/cart2', function () {
    return view('templates.cart2');
})->name('cart2');

Route::get('/cart3', function () {
    return view('templates.cart3');
});

Route::get('/register', function () {
    return view('templates.register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
