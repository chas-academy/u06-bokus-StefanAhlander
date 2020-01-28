<?php

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

Route::get('/', 'MainController@index');

Route::get('/search', 'BookController@search');

Route::get('/search_results', 'BookController@find');

Route::post('/cart', 'CartController@update');

Route::get('/cart', 'CartController@index');

Route::delete('/cart', 'CartController@destroy');

Route::get('/check_out', 'CartController@checkout');
?>