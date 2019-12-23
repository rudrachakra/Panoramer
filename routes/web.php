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

Route::get('/', 'FrontController@load');

Route::get('/admin', 'AdminController@admin')->middleware(['IsAdmin', 'AdminPanosList']);
Route::get('/admin/login', 'AdminController@login')->middleware(['checkAdmin', 'signError']);
Route::post('/admin/checker', 'AdminController@checkAuth')->middleware('isValidUser');
Route::get('/admin/add', 'AdminController@addPanoForm')->middleware('IsAdmin');
Route::post('/admin/add', 'AdminController@addPanoAction')->middleware(['IsAdmin', 'addPano']);
Route::get('/admin/edit/{id}', 'AdminController@editPano')->where('id', '[0-9]+')->middleware('IsAdmin');
Route::post('/admin/edit/{id}', 'AdminController@editPanoAction')->where('id', '[0-9]+')->middleware(['IsAdmin', 'UpdatePano']);
Route::get('/admin/delete/{id}', 'AdminController@deletePano')->where('id', '[0-9]+')->middleware('IsAdmin');
Route::get('/admin/points/edit/{id}', 'AdminController@setPoints')->where('id', '[0-9]+')->middleware('IsAdmin');


Route::get('/api/view/{id}', 'ApiController@getView')->where('id', '[0-9]+');
