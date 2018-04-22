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

Route::get('/', ['uses'=>'AdController@index','as'=>'home']);
Route::get('/{id}','AdController@show');

Route::post('delete/{id}','AdController@destroy');
Route::post('login','Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
