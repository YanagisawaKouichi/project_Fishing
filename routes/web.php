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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function() {
     Route::get('fish/create', 'Admin\FishController@add');
     Route::post('fish/create', 'Admin\FishController@create');# 追記
     Route::get('fish', 'Admin\FishController@index');
     
     Route::get('place/create', 'Admin\PlaceController@add');
     Route::post('place/create', 'Admin\PlaceController@create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
