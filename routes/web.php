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

// Login
Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// Dashboard
Route::get('/dashboard', 'DashboardController@index');

//User
Route::get('/user', 'UserController@index');
Route::get('/user/tambah', 'UserController@create');
Route::post('/user/post', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::put('/user/update/{id}', 'UserController@update');
Route::get('/user/delete/{id}', 'UserController@delete');

//Karyawan 
Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/tambah', 'KaryawanController@create');
Route::post('/karyawan/post', 'KaryawanController@store');
Route::get('/karyawan/edit/{id}', 'KaryawanController@edit');
Route::put('/karyawan/update/{id}', 'KaryawanController@update');
Route::get('/karyawan/delete/{id}', 'KaryawanController@delete');
