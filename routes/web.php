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
Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::patch('/category/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/{id}', 'CategoryController@show')->name('category.show');

Route::get('/clothes/create', 'ClothesController@create')->name('clothes.create');
Route::post('/clothes', 'ClothesController@store')->name('clothes.store');
Route::delete('/clothes/{id}', 'ClothesController@destroy')->name('clothes.destroy');
Route::patch('/clothes/{id}', 'ClothesController@update')->name('clothes.update');
Route::get('/clothes/{id}/edit', 'ClothesController@edit')->name('clothes.edit');
Route::get('/clothes/{id}', 'ClothesController@show')->name('clothes.show');

Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/store/manage', 'StoreController@manage')->name('store.manage');
Route::get('/store/create', 'StoreController@create')->name('store.create');
Route::post('/store', 'StoreController@store')->name('store.store');
Route::get('/store/{id}/edit', 'StoreController@edit')->name('store.edit');
Route::patch('/store/{id}', 'StoreController@update')->name('store.update');
Route::delete('/store/{id}', 'StoreController@destroy')->name('store.destroy');


Route::get('/cart', 'CartController@index')->name('cart');
Route::delete('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('/cart/{id}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{id}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');

Route::get('/transaction', 'TransactionController@index')->name('transaction.index');
Route::post('/transaction', 'TransactionController@store')->name('transaction.store');
