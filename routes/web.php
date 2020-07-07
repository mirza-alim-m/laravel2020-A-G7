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


Auth::routes();



Route::group(['middleware' => ['auth']], function () {

	Route::get('/', function () {
    return view('index');

	});
    Route::resource('/mahasiswas', 'MahasiswaController');
    Route::resource('/karyawans', 'KaryawanController');
    Route::resource('karyawan', 'DataController');
    Route::get('karyawanajax', 'DataController@ajax');
    Route::resource('penggajian', 'PenggajianController');
    
    
    Route::get('/home', 'HomeController@index')->name('home');

});
Route::get('/sign-in/github', 'Auth\LoginController@github');
	Route::get('/sign-in/github/redirect', 'Auth\LoginController@githubRedirect'); 

