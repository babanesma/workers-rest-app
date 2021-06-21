<?php

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

Route::group(['prefix' => 'workers'], function () {
    Route::get('/', 'WorkerController@index');
    Route::get('/{id}', 'WorkerController@show');
    Route::post('/', 'WorkerController@store');
    Route::put('/{id}', 'WorkerController@update');
    Route::delete('/{id}', 'WorkerController@destroy');
});

Route::group(['prefix' => 'shifts'], function () {
    Route::get('/', 'ShiftController@index');
    Route::get('/{id}', 'ShiftController@show');
    Route::post('/', 'ShiftController@store');
    Route::put('/{id}', 'ShiftController@update');
    Route::delete('/{id}', 'ShiftController@destroy');
});
