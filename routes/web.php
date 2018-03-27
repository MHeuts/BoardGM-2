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


Route::namespace('frontend')->group(function () {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('/producttest', ['as' => 'product.index', 'uses' => 'ProductTestController@index']);

});

Route::namespace('backend')->prefix('admin')->group(function(){
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::resource('/product', 'ProductController');
});

Route::get('/home', 'HomeController@index')->name('home');