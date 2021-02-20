<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('products')->group(function () {
    Route::post('/', 'ProductController@store');
    Route::get('list/{page}/', 'ProductController@list');
    Route::delete('{product}/', 'ProductController@destroy');
    Route::get('{product}/edit/', 'ProductController@edit');
    Route::put('{product}/', 'ProductController@update');
});

Route::get('category/', 'CategoryController@index'); 

Route::get('brand/', 'BrandController@index');

Route::get('color/', 'ColorController@index');

Route::get('size/', 'SizeController@index');

Route::post('image/', 'ImageController@store');

Route::get('image/{product}/', 'ImageController@show');
