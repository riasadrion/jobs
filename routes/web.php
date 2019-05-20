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

Route::get('/', 'PagesController@index');
Route::post('/cities/store', 'LocationController@citystore');
Route::resource('jobs', 'JobController');
Route::resource('categories', 'CategoryController');
Route::resource('locations', 'LocationController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
