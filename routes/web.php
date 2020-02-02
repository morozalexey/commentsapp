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


Route::get('/', 'HomeController@index')->name('comments.index');

Route::post('comments/create', 'HomeController@create')->name('comments.create');

Route::get('comments/admin', 'HomeController@admin')->name('comments.admin');

Route::get('profile', 'HomeController@profile')->name('comments.profile');

Route::put('comments/{id}/hide', 'HomeController@hide')->name('comments.hide');

Route::put('comments/{id}/show', 'HomeController@show')->name('comments.show');

Route::put('comments/{id}/destroy', 'HomeController@destroy')->name('comments.destroy');

Route::post('comments/changeavatar', 'HomeController@changeavatar')->name('comments.changeavatar');

Route::post('comments/changename', 'HomeController@changename')->name('comments.changename');

Route::post('comments/changeemail', 'HomeController@changeemail')->name('comments.changeemail');

Auth::routes();

Route::get('/faker', 'HomeController@faker')->name('faker');