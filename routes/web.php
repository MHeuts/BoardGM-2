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
	Route::post('/updateQty/{id}', 'CartController@updateQty')->name('updateQty');
	Route::get('/removeFromCart/{id}', 'CartController@removeFromCart')->name('removeFromCart');
});

Route::namespace('order')->middleware('auth')->group(function () {
	Route::get('/checkout', 'OrderController@index')->name('checkout');
	Route::get('/payment', 'OrderController@payment')->name('payment');
	Route::get('/payed', 'OrderController@payed')->name('payed');
});

Route::namespace('backend')->prefix('admin')->group(function(){
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::resource('products', 'ProductController');
    Route::post('products/{id}/PhotoUpload', 'ProductController@uploadPhoto')->name('products.photo');
    Route::resource('categories', 'CategoryController');
});
