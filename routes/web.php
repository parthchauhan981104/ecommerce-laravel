<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
	'uses' => 'FrontEndController@index',
	'as' => 'index' //name
]);

Route::resource('products', 'ProductsController');

Route::get('/product/{id}', [
	'uses' => 'FrontEndController@singleProduct',
	'as' => 'product.single' //name)
]);

Route::post('/cart/add', [
	'uses' => 'ShoppingController@add_to_cart',
	'as' => 'cart.add' //name
]);

Route::get('/cart', [
	'uses' => 'ShoppingController@cart',
	'as' => 'cart' //name
]);

Route::get('/cart/delete/{id}', [
	'uses' => 'ShoppingController@cart_delete',
	'as' => 'cart.delete' //name
]);

Route::get('cart/incr/{id}/{qty}', [
    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

Route::get('cart/decr/{id}/{qty}', [
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
