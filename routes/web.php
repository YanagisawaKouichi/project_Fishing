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
     Route::get('fish/edit', 'Admin\FishController@edit'); 
     Route::post('fish/edit', 'Admin\FishController@update');
     Route::get('fish/delete', 'Admin\FishController@delete');
     
     Route::get('place/create', 'Admin\PlaceController@add');
     Route::post('place/create', 'Admin\PlaceController@create');
});  Route::get('place', 'Admin\PlaceController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
