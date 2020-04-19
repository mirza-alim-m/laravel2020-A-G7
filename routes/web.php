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
    return view('layout.app');
});

Route::resource('/mahasiswas', 'MahasiswaController');
Route::resource('/karyawans', 'KaryawanController');
Route::get('coba', function () {
    return view('layout.app');
});
Route::resource('karyawan', 'DataController');
Route::get('karyawanajax', 'DataController@ajax');
Route::resource('penggajian', 'PenggajianController');