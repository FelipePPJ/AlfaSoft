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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/admin', 'AdminController@index')->name('admin');
Route::any('/admin/new', 'AdminController@new')->name('new');
Route::any('/admin/edit/{user_id?}', 'AdminController@edit')->name('edit');
Route::get('/admin/delete/{user_id?}', 'AdminController@delete')->name('delete');