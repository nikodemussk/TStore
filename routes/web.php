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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::post('/category', 'CategoryController@store')->name('category.store');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::patch('/category/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/{id}', 'CategoryController@show')->name('category.show');

Route::get('/clothes/create', 'ClothesController@create')->name('clothes.create');
Route::post('/clothes', 'ClothesController@store')->name('clothes.store');
Route::patch('/clothes/{id}', 'ClothesController@update')->name('clothes.update');
Route::get('/clothes/{id}/edit', 'ClothesController@edit')->name('clothes.edit');
Route::get('/clothes/{id}', 'ClothesController@show')->name('clothes.show');

Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/store/create', 'StoreController@create')->name('store.create');
Route::post('/store', 'StoreController@store')->name('store.store');
