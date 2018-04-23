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
Route::get('/edit','AdController@create');
Route::post('/edit',['middleware' => 'auth', 'uses' => 'AdController@store','as'=>'update']);
Route::get('/edit/{id}',['middleware' => 'auth', 'uses' => 'AdController@edit']);
Route::put('/edit/{id}',['middleware' => 'auth', 'uses' => 'AdController@update']);

Route::get('/{id}','AdController@show');

//Route::post('/','AdController@store');

Route::post('delete/{id}','AdController@destroy');

Route::post('login','Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
