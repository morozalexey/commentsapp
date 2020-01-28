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


Route::get('/', 'HomeController@index');

Route::post('/store', 'HomeController@store');

Route::get('/admin', 'HomeController@admin');

Route::get('/profile', 'HomeController@profile');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faker', function (){
	factory(App\Comment::class, 5)->create();
	return redirect ('/home');
});