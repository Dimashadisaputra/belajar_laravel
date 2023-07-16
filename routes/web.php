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

route::middleware('User_Login')-> //berhubunhan sama middleware perhatikan besar kecilnya huruf
group(function (){
    Route::get('/', 'HomeController@index');
    
    // USER 
    Route::get('/user', 'UserController@index');
    // user tambah kalo pake get/post bikin 2 sama kayak login
    Route::any('/user/tambahUser', 'UserController@tambah');
    // user edit
    Route::any('/user/{id}/editUser', 'UserController@edit');
    // Hapus USer
    Route::get('/user/{id}/hapus', 'UserController@hapus');


    // Biodata
    Route::get('/biodata', 'BiodataController@index');
    // tambah biodata
    route::any('/biodata/tambahbiodata', 'BiodataController@tambah');
    // cetak biodata
    route::get('/biodata/cetakbiodata', 'BiodataController@cetakbiodata');
    // Edit Biodata 
    Route::any('/biodata/{id}/editbiodata', 'BiodataController@edit');
    // hapus biodata
    route::get('/biodata/{id}/hapusbiodata', 'BiodataController@hapus');
    // cetak
    route::get('/biodata/{id}/cetakbiodatauser', 'BiodataController@cetakbiodatauser');


    // pegawai
    route::get('/pegawai', 'PegawaiController@index');
    route::any('/pegawai/{id}/editpegawai', 'PegawaiController@edit');

    // LAPORAN API
    route::get('/laporan', 'LaporanController@index');

    // SEACRH
    route::get('/search', 'searchController@index');

    // MENAMPILKAN DETAIL BIODATA PK API
    // route::get('/biodata/{id}/detailbiodata', 'BiodataController@detailbiodata');

    //logout
    route::any('/logout', function () {
        \Session::forget('user');
        return redirect(url('/login'))->with('pesan_gagal', 'anda keluar');
    });
});

route::middleware('User_Not_Login')->
group(function (){
    // Login
    route::get('/login', 'LoginController@index');
    route::post('/login', 'LoginController@login');

    // Register
    route::get('/register', 'RegisterController@index');
    route::post('/register', 'RegisterController@register');

});
