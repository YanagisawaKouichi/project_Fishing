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
     Route::get('fish/create', 'Admin\FishController@add')->middleware('auth');
     Route::post('fish/create', 'Admin\FishController@create')->middleware('auth');# 追記
     Route::get('fish', 'Admin\FishController@index')->middleware('auth');
     Route::get('fish/edit', 'Admin\FishController@edit')->middleware('auth'); 
     Route::post('fish/edit', 'Admin\FishController@update')->middleware('auth');
     Route::get('fish/delete', 'Admin\FishController@delete')->middleware('auth');
     
     Route::get('place/create', 'Admin\PlaceController@add')->middleware('auth');
     Route::post('place/create', 'Admin\PlaceController@create')->middleware('auth');
     Route::get('place', 'Admin\PlaceController@index')->middleware('auth');
     Route::get('place/edit', 'Admin\PlaceController@edit')->middleware('auth'); // 追記
     Route::post('place/edit', 'Admin\PlaceController@update')->middleware('auth');
     Route::get('place/delete', 'Admin\PlaceController@delete')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FishController@index');

Route::get('/', 'PlaceController@index');