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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('frontend')->group(function () {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('/producttest', ['as' => 'product.index', 'uses' => 'ProductTestController@index']);
	Route::get('/products', 'ProductsController@index')->name('catalog');
    Route::get('/products/{id}', 'ProductsController@displayProduct')->name('displayProduct');
    Route::get('/user', 'UserController@details')->name('userDetails');
});

Route::namespace('cart')->middleware('auth')->group(function () {
	Route::get('/cart', 'CartController@index')->name('cart');
	Route::get('/addToCart/{id}', 'CartController@addToCart')->name('addToCart');
	Route::post('/updateQty/{id}', 'CartController@updateQty')->name('updateQty');
	Route::get('/removeFromCart/{id}', 'CartController@removeFromCart')->name('removeFromCart');
});

Route::namespace('order')->middleware('auth')->group(function () {
	Route::get('/checkout', 'OrderController@index')->name('checkout');
	Route::get('/payment', 'OrderController@payment')->name('payment');
	Route::get('/payed', 'OrderController@payed')->name('payed');
});

Route::namespace('backend')->prefix('cms')->middleware('isAdmin')->group(function(){
	Route::get('/', 'HomeController@index')->name('cms');
    Route::post('products/{id}/PhotoUpload', 'ProductController@uploadPhoto')->name('products.photo');
	Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('orders', 'OrderController');
    Route::resource('users', 'UserController');
});

Route::namespace('search')->group(function(){
    Route::get('/search', 'SearchController@search')->name('search');
});
