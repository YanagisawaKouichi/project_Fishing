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
    Route::get('fishing/create', 'Admin\FishingController@add');
    Route::post('fishing/create', 'Admin\FishingController@create');
    Route::get('fishing/edit', 'Admin\FishingController@edit');
    Route::post('fishing/edit', 'Admin\FishingController@edit');
    Route::post('fishing/edit', 'Admin\FishingController@update');
});