<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('tasks', 'TaskController@index');
Route::post('tasks', 'TaskController@store');
Route::get('completed-tasks', 'TaskController@completedTasks');
Route::post('done-task', 'TaskController@doneTask');
Route::delete('tasks/{id}', 'TaskController@destroy');


Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show');

Route::post('categories', 'CategoryController@store');
Route::delete('categories/{id}', 'CategoryController@destroy');
Route::put('categories/{id}', 'CategoryController@update');