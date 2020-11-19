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

Route::prefix('sales')->group(function() {
    Route::get('/', 'SalesController@index')->name('sales.index');
    Route::get('/vender', 'SalesController@create')->name('sales.create');
    Route::post('/vender', 'SalesController@store')->name('sales.store');
    Route::get('/actualizar/{id}', 'SalesController@edit')->name('sales.edit');
    Route::post('/actualizar/{id}', 'SalesController@update')->name('sales.update');
    Route::get('/destroy/{id}', 'SalesController@destroy')->name('sales.destroy');
});
