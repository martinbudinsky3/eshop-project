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

Route::prefix('products')->group(function () {
    Route::post('/', 'ProductController@store');
    Route::get('list/{page}/', 'ProductController@list');
    Route::delete('{product}/', 'ProductController@destroy');
    Route::get('{product}/edit/', 'ProductController@edit');
    Route::put('{product}/', 'ProductController@update');
});

Route::prefix('questions')->group(function () {
    Route::get('/', 'QuestionController@index');
    Route::post('/', 'QuestionController@store');
    Route::get('{question}/', 'QuestionController@show');
    Route::get('{question}/edit', 'QuestionController@edit');
    Route::put('{question}/', 'QuestionController@update');
    Route::delete('{question}/', 'QuestionController@destroy');
    Route::post('{question}/answers/', 'AnswerController@store');
    Route::get('{question}/answers/', 'QuestionController@indexAnswers');
    Route::get('{question}/results/', 'QuestionController@results');
});

Route::prefix('answers')->group(function () {
    Route::delete('{answer}/', 'AnswerController@destroy');
    Route::put('{answer}/', 'AnswerController@update');
});

Route::get('category/', 'CategoryController@index');

Route::get('brand/', 'BrandController@index');

Route::get('color/', 'ColorController@index');

Route::get('size/', 'SizeController@index');
