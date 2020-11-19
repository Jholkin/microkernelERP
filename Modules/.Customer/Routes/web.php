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

Route::prefix('customer')->group(function() {
    Route::get('/', 'CustomerController@index')->name('customer.index');
    Route::get('/create', 'CustomerController@create')->name('customer.create');
    Route::post('/create', 'CustomerController@store')->name('customer.store');
    Route::get('/edit/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::post('/edit/{id}', 'CustomerController@update')->name('customer.update');
    Route::get('/delete/{id}', 'CustomerController@destroy')->name('customer.destroy');
});
