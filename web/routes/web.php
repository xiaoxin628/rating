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

use Illuminate\Support\Facades\Auth;

Route::get('/', 'StoreController@index')->name('tore');;

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'StoreController@index')->name('home');
Route::resource('store', 'StoreController');