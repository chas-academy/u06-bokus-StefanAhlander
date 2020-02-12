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

Route::get('/recommendations', 'BookController@tips');

/** The rout for updating or adding books to the cart fills two purposes. Adding to an empty
 *  cart or updating an existing cart. Adding to an empty cart is the same as creating a new 
 *  cart and a POST request is the right choice. For updating an existing cart PUT would be the
 *  better choice. Because the actions are combined I've gone for POST.
 */
Route::post('/cart', 'CartController@update');

Route::get('/cart', 'CartController@index');

Route::delete('/cart', 'CartController@destroy');

Route::get('/check_out', 'CartController@checkout');

Route::get('/books', 'BookController@index');

Route::get('/books/{id}', 'BookController@show');

?>