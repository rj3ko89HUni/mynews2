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

// Route::group(['prefix' => 'XXX'], funciton() {
//   Route::get('XXX', 'AAAController@bbb');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('news/create', 'Admin\NewsController@add');
  Route::get('news/edit', 'Admin\NewsController@edit');
  Route::get('news', 'Admin\NewsController@index');
  Route::get('news/delete', 'Admin\NewsController@delete');
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::get('profile', 'Admin\ProfileController@index');
  Route::get('profile/delete', 'Admin\ProfileController@delete');
  Route::post('news/create', 'Admin\NewsController@create');
  Route::post('news/edit', 'Admin\NewsController@update');
  Route::post('profile/create', 'Admin\ProfileController@create');
  Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
