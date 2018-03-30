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
	Route::get('/products', ['as' => 'products.index', 'uses' => 'ProductsController@index', 'name' => 'catalog']);
	Route::get('/products', 'ProductsController@index')->name('catalog');
    Route::get('/products/{id}', 'ProductsController@displayProduct')->name('displayProduct');

});

Route::namespace('backend')->prefix('admin')->group(function(){
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::resource('products', 'ProductController');
    Route::post('products/{id}/PhotoUpload', 'ProductController@uploadPhoto')->name('products.photo');
});

Route::get('/home', 'HomeController@index')->name('home');