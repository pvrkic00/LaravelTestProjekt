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

Route::middleware('auth')->group(function () {
    Route::get('/home','ContentController@content' )->name('content');

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/','ContentController@content');




});




Auth::routes();



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
