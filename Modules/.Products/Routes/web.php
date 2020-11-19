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

Route::prefix('products')->group(function() {
    Route::get('/', 'ProductsController@index')->name('products.index');
    Route::get('/create', 'ProductsController@create')->name('products.create');
    Route::post('/create', 'ProductsController@store')->name('products.store');
    Route::get('/edit/{id}', 'ProductsController@edit')->name('products.edit');
    Route::post('/edit/{id}', 'ProductsController@update')->name('products.update');
    Route::get('/destroy/{id}', 'ProductsController@destroy')->name('products.destroy');
});
