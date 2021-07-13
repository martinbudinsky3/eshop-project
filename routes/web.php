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

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', function() {
            return view('templates.profile.profile');
        });
        Route::get('settings/', function() {
            return view('templates.profile.settings');
        });
        Route::get('info/', 'ProfileController@info');
        Route::get('orders/', 'ProfileController@orders');
    });

    Route::group(['prefix' => 'deliveries'], function() {
        Route::put('/', 'DeliveryController@update');
        Route::delete('/', 'DeliveryController@destroy');
    });

    Route::group(['prefix' => 'user'], function() {
        Route::put('password/', 'UserController@changePassword')->name('change.password');
        Route::put('phone/', 'UserController@changePhone')->name('change.phone');
    });

    Route::get('orders/{order}', 'OrderController@show')->middleware('can:show,order');

    Route::post('questions/{question}/votings/', 'VotingController@store')
        ->middleware('can:create, App\Models\Voting');
});

Auth::routes();
