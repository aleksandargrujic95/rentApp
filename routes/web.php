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

Route::resource('sonies', 'SoniesController');
Route::get('getCustomer', 'SoniesController@getCustomer');


Route::resource('customers', 'CustomersController');

Route::get('search', 'CustomersController@search');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');







Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
