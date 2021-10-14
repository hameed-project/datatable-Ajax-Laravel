<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks','TasksController@index');

Route::post('/add-tasks','TasksController@insertData');

Route::get('delete-tasks/{id}', 'TasksController@deleteNote');

Route::post('edit-tasks/{id}', 'TasksController@viewEditNote');

