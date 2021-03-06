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

Route::get('/', function () {
	return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
	Route::group(['prefix' => 'category'], function () {
		Route::get('/', 'CategoryController@index')->name('admin.category.index');
		Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete')->where('id', '[0-9]+');
		Route::get('/show/{id}', 'CategoryController@show')->name('admin.category.show')->where('id', '[0-9]+');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit')->where('id', '[0-9]+');
		Route::put('/update/{id}', 'CategoryController@update')->name('admin.category.update')->where('id', '[0-9]+');
		Route::get('/create', 'CategoryController@create')->name('admin.category.create');
		Route::post('/store', 'CategoryController@store')->name('admin.category.store');
	});

	Route::group(['prefix' => 'post'], function () {
		Route::get('/', 'PostController@index')->name('admin.post.index');
		Route::get('/delete/{id}', 'PostController@destroy')->name('admin.post.delete')->where('id', '[0-9]+');
		Route::get('/show/{id}', 'PostController@show')->name('admin.post.show')->where('id', '[0-9]+');
		Route::get('/edit/{id}', 'PostController@edit')->name('admin.post.edit')->where('id', '[0-9]+');
		Route::put('/update/{id}', 'PostController@update')->name('admin.post.update')->where('id', '[0-9]+');
		Route::get('/create', 'PostController@create')->name('admin.post.create');
		Route::post('/store', 'PostController@store')->name('admin.post.store');
	});
});
