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


Route::group(['namespace' => 'frontend', 'as' => 'frontend.'], function(){
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
});

Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'as' => 'backend.'], function(){
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
});
