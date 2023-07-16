<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api')->group(function(){
    // laporan
    Route::post('/laporan', 'ApiController@laporan');
    // biodata
    Route::get('/detailbiodata/{user_id}', 'ApiController@detailbiodata');
    Route::get('/hapusbiodata/{id}', 'ApiController@hapusbiodata');

    // USER
    route::post('/user', 'ApiController@store');
    route::get('/useredit/{id}', 'ApiController@edit');
    route::put('/updateUserApi/{id}', 'ApiController@update');
    route::delete('/deleteUserApi/{id}', 'ApiController@delete');

    
});
