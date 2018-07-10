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

//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes();
Route::get('finance/list', 'FinanceController@Datalist');
Route::get('user/list', 'UserController@Datalist');
Route::resource('finance','FinanceController');
Route::resource('user','UserController');

Route::get('/', 'FinanceController@index')->name('home');
Route::get('/home', 'FinanceController@index')->name('home');

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
