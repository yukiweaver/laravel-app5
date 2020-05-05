<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'guest'], function() {
  Route::get('/', 'UserController@signin')->name('user.signin');
  Route::post('/user/login', 'UserController@login')->name('user.login');
  Route::get('/user/create', 'UserController@create')->name('user.create');
  Route::post('/user/store', 'UserController@store')->name('user.store');
});


Route::group(['middleware' => 'auth'], function() {
  Route::get('/item/index', 'ItemController@index')->name('item.index');
  Route::post('/user/logout', 'UserController@logout')->name('user.logout');
  Route::get('/item/detail', 'ItemController@detail')->name('item.detail');
});
