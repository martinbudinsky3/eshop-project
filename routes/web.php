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

Route::get('categories/{category}', 'CategoryController@show');

Route::get('category/', 'CategoryController@index'); //*

Route::get('cart/', 'CartController@show');

Route::get('cart/delivery/', 'CartController@delivery')->middleware('cart');

Route::get('order/create/', 'OrderController@create')->middleware('cart');

Route::post('order/', 'OrderController@store')->middleware('cart');

Route::post('cart-item/', 'CartItemController@store');

Route::put('cart-item/{id}/', 'CartItemController@update');

Route::delete('cart-item/{id}/', 'CartItemController@destroy');

Route::get('cart/login/', 'CartController@login');

Route::get('products/', 'ProductController@index');

Route::get('products/{product}/', 'ProductController@show');

Route::get('products/list/{page}/', 'ProductController@list');

Route::delete('products/{product}/', 'ProductController@destroy');

Route::post('products/', 'ProductController@store');

Route::get('products/{product}/edit/', 'ProductController@edit');

Route::put('products/{product}/', 'ProductController@update');

Route::get('brand/', 'BrandController@index'); //*

Route::get('color/', 'ColorController@index'); //*

Route::get('size/', 'SizeController@index'); //*

Route::post('image/', 'ImageController@store'); //*

Route::get('image/{product}/', 'ImageController@show'); //*

Route::group(['middleware' => 'auth', 'prefix' => 'profile'], function() {
    Route::get('/', function() {
        return view('templates.profile.profile');
    });
    Route::get('settings/', function() {
        return view('templates.profile.settings');
    });
    Route::get('info/', 'ProfileController@info');
    Route::get('orders/', 'ProfileController@orders');
});

Route::get('orders/{order}', 'OrderController@show')->middleware('auth', 'can:show,order');

Route::group(['middleware' => 'auth', 'prefix' => 'deliveries'], function() {
    Route::put('/', 'DeliveryController@update');
    Route::delete('/', 'DeliveryController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function() {
    Route::put('password/', 'UserController@changePassword')->name('change.password');
    Route::put('phone/', 'UserController@changePhone')->name('change.phone');
});

Auth::routes();
