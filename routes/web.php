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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'pagesController@index');
// Route::get('/login', 'pagesController@login');
// Route::get('/admin', 'pagesController@admin');
// Route::get('/user', 'pagesController@user');

Route::group(['middleware' => ['auth', 'checkRole:ortu']], function ()
{
    // Route::get('/admin', 'pagesController@admin');
    Route::get('/user', 'OrtuController@akunUser');
    Route::patch('/user/{id}/update', 'OrtuController@update');
    Route::patch('/user/{id}/updateUser', 'OrtuController@updateUser');

    //grafik
    Route::get('/u_index', 'pagesController@user')->name('ortu');
    Route::get('/d_grafik_anak', 'OrtuController@grafik')->name('grafik.anak');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,superadmin']], function ()
{
    Route::get('/dashboard', 'pagesController@admin')->name('admin');

    //data anggota
    Route::get('/d_anggota', 'AnggotasController@index');
    Route::post('/d_anggota', 'AnggotasController@store');
    Route::patch('/d_anggota/{id_anggota}/update', 'AnggotasController@update');
    Route::delete('/d_anggota/{id_anggota}/destroy', 'AnggotasController@destroy');

    //data balita
    Route::get('/d_balita', 'BalitasController@index');
    Route::post('/d_balita', 'BalitasController@store');
    Route::patch('/d_balita/{id_balita}/update', 'BalitasController@update');
    Route::delete('/d_balita/{id_balita}/destroy', 'BalitasController@destroy');

    //data kms
    Route::get('/d_kms', 'KmsController@index');
    Route::post('/d_kms', 'KmsController@store');
    Route::patch('/d_kms/{id}/update', 'KmsController@update');
    Route::delete('/d_kms/{id}/destroy', 'KmsController@destroy');
    Route::post('/autocomplete/fetch', 'KmsController@fetch')->name('autocomplete.fetch');

    //chart
    Route::get('/d_grafik', 'GrafiksController@index');
    Route::post('/d_grafik/chart', 'GrafiksController@chart')->name('kms.chart');
    // Route::get('/user', 'pagesController@user');

    //admin controller
    Route::get('/d_akun', 'pagesController@akunAdmin');
    Route::patch('/d_akun/{id}/update', 'AdminController@update');
    Route::patch('/d_akun/{id}/updateUser', 'AdminController@updateUser');

});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
