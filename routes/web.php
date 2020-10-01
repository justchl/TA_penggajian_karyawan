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

//Karyawan 
Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/tambah', 'KaryawanController@create');
