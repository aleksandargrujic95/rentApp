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


Route::resource('projects', 'ProjectsController')->middleware('can:update, project');
Route::get('/test', 'PagesController@test');

Route::resource('sonies', 'SoniesController');
Route::get('getCustomer', 'SoniesController@getCustomer');
Route::get('/sonies/{sony}/stockUpdate', 'SoniesController@stockUpdate');
Route::resource('customers', 'CustomersController');


Route::get('search', 'CustomersController@search');
Route::get('searchNumber', 'CustomersController@searchNumber');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::get('/import', 'ImportExcelController@index');
Route::post('/import/import', 'ImportExcelController@import');







Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('import', 'CustomersController@import');
