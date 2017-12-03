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

Route::get('/', 'AdsController@index')->name('ads');
Route::get('/ikelti-skelbima', 'AdsController@create')->name('ads_create');
Route::post('/ikelti-skelbima', 'AdsController@store')->name('ads_insert');
