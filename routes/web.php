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
Route::get('/dashboard/chart-gaji', 'DashboardController@getChartGaji');

//User
Route::get('/user', 'UserController@index');
Route::get('/user/tambah', 'UserController@create');
Route::post('/user/post', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::put('/user/update/{id}', 'UserController@update');
Route::get('/user/delete/{id}', 'UserController@delete');

//Level User
Route::get('/level', 'LevelController@index');
Route::get('/level/tambah', 'LevelController@create');
Route::post('/level/post', 'LevelController@store');
Route::get('/level/edit/{id}', 'LevelController@edit');
Route::put('/level/update/{id}', 'LevelController@update');
Route::get('/level/delete/{id}', 'LevelController@delete');

//Karyawan 
Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/tambah', 'KaryawanController@create');
Route::post('/karyawan/post', 'KaryawanController@store');
Route::get('/karyawan/edit/{id}', 'KaryawanController@edit');
Route::put('/karyawan/update/{id}', 'KaryawanController@update');
Route::get('/karyawan/delete/{id}', 'KaryawanController@delete');
Route::get('/karyawan/detail/{id}', 'KaryawanController@detail');

//Tunjangan
Route::get('/tunjangan', 'TunjanganController@index');
Route::get('/tunjangan/tambah', 'TunjanganController@create');
Route::post('/tunjangan/post', 'TunjanganController@store');
Route::get('/tunjangan/edit/{id}', 'TunjanganController@edit');
Route::put('/tunjangan/update/{id}', 'TunjanganController@update');
Route::get('/tunjangan/delete/{id}', 'TunjanganController@delete');

//Golongan
Route::get('/golongan', 'GolonganController@index');
Route::get('/golongan/tambah', 'GolonganController@create');
Route::post('/golongan/post', 'GolonganController@store');
Route::get('/golongan/edit/{id}', 'GolonganController@edit');
Route::put('/golongan/update/{id}', 'GolonganController@update');
Route::get('/golongan/delete/{id}', 'GolonganController@delete');

//Absensi
Route::get('/absensi', 'AbsensiController@index');
Route::get('/absensi/tambah', 'AbsensiController@create');
Route::post('/absensi/post', 'AbsensiController@store');
Route::get('/absensi/edit/{id}', 'AbsensiController@edit');
Route::put('/absensi/update/{id}', 'AbsensiController@update');
Route::get('/absensi/delete/{id}', 'AbsensiController@delete');
Route::post('/absensi/uploadFile', 'AbsensiController@uploadFile');

//Gaji
Route::get('/gaji', 'GajiController@index');
Route::get('/gaji/tambah', 'GajiController@create');
Route::post('/gaji/post', 'GajiController@store');
Route::get('/gaji/edit/{id}', 'GajiController@edit');
Route::put('/gaji/update/{id}', 'GajiController@update');
Route::get('/gaji/delete/{id}', 'GajiController@delete');
Route::get('/gaji/detail/{id}', 'GajiController@detail');

Route::get('/get-karyawan/{nik}', 'GajiController@getDataKaryawan');
Route::get('/get-absensi/{nik}', 'GajiController@getPotongan');
Route::get('/get-lembur/{nik}', 'GajiController@getLembur');

//Laporan
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/detail/{id}', 'LaporanController@detail');
Route::get('/laporan/cetak', 'LaporanController@printReport');
Route::post('/laporan/filter', 'LaporanController@filterData');

