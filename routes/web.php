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


Auth::routes();

Route::get('auth/logout', 'Auth\LogoutController@logout')->name('user.logout');

Route::get('/home', 'HomeController@index');

Route::get('admin/dashboard', 'categories@index','')->name('admin.dashboard');

Route::resource('services', 'ServiceController');

Route::get('services/delete/{id}', 'ServiceController@delete')->name('services.delete');

Route::resource('categories', 'CategoryController');

Route::get('categories/delete/{id}', 'CategoryController@delete')->name('categories.delete');

Route::resource('items', 'ItemController');

Route::get('items/delete/{id}', 'ItemController@delete')->name('items.delete');

Route::get('items/import/{id}', 'ItemController@import')->name('items.import');


