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

Route::prefix('employees')->group(function() {
    Route::get('/', 'EmployeesController@index')->name('employees.index');
    Route::get('/create', 'EmployeesController@create')->name('employees.create');
    Route::post('/create', 'EmployeesController@store')->name('employees.store');
    Route::get('/edit/{id}', 'EmployeesController@edit')->name('employees.edit');
    Route::post('/edit/{id}', 'EmployeesController@update')->name('employees.update');
    Route::get('/destroy/{id}', 'EmployeesController@destroy')->name('employees.destroy');
});
