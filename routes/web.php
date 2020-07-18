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


//Location Routes
Route::resource('locations', 'LocationController');
Route::post('/cities/store', 'LocationController@citystore');
Route::post('/cities/{city}/update', 'LocationController@cityupdate');
Route::delete('/cities/{city}/delete', 'LocationController@citydestroy');


//Job Routes
Route::resource('jobs', 'JobController');



//Company Routes
Route::resource('companies', 'CompanyController');


// //Category Routes
// Route::resource('categories', 'CategoryController');

//Type Routes
Route::get('/types', 'JobController@typeindex');
Route::post('/types/store', 'JobController@typestore');
Route::post('/types/{type}/update', 'JobController@typeupdate');
Route::delete('/types/{type}/delete', 'JobController@typedestroy');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Admin routes
Route::namespace('Admin')->group(function () {
    Route::get('controller-dashboard', 'DashboardController@index');
    Route::resource('controller-categories', 'CategoriesController');
});
