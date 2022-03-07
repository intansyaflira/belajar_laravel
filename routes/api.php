<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
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



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kelas', 'KelasController@show');
Route::post('/kelas', 'KelasController@store');

Route::get('/siswa', 'SiswaController@show');
Route::post('/siswa/{id}', 'SiswaController@detail') ;
Route::post('/siswa', 'SiswaController@store');