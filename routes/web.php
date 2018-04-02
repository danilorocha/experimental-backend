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

Route::get('/', 'NumberController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/administracao', 'NumberController@index')->name('administracao');
Route::post('/administracao', 'NumberController@store');
Route::post('/administracao/update/{id}', 'NumberController@update'); //Route::put('/administracao/{id}', 'NumberController@update');
Route::get('/administracao/delete/{id}', 'NumberController@destroy'); //Route::delete('/administracao/{id}', 'NumberController@destroy');