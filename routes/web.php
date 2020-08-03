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
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
        Route::put('/update', 'CategoryController@update')->name('admin.category.update');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::put('/store', 'CategoryController@store')->name('admin.category.store');
    });
});
