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
});

Route::namespace('cart')->middleware('auth')->group(function () {
	Route::get('/cart', 'CartController@index')->name('cart');
	Route::get('/addToCart/{id}', 'CartController@addToCart')->name('addToCart');
	Route::get('/checkout', 'CartController@checkout')->name('checkout');
	Route::post('/updateQty/{id}', 'CartController@updateQty')->name('updateQty');
	Route::get('/removeFromCart/{id}', 'CartController@removeFromCart')->name('removeFromCart');
});

Route::namespace('backend')->prefix('cms')->middleware('auth')->group(function(){
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    //Route::resource('/product', 'ProductController');
});
