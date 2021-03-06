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
    Route::get('/home','ContentController@index' )->name('content');

    Route::get('/addSite','SiteController@index')->name('addSite');
    Route::post('/addSite', 'SiteController@newSite')->name('newSite');

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/','ContentController@index');




});




Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
