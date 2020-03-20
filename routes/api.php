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

Route::apiResource('posts', 'PostController')->names('api.')->only(['index', 'show']);

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::post('/authenticate', 'AuthController@authenticate')->name('authenticate');
    Route::post('/verify', 'AuthController@verify')->name('verify');
    Route::post('/logout', 'AuthController@logout')->name('logout');
});

Route::prefix('/azlink')->middleware('server.token')->group(function () {
    Route::get('/', 'ServerController@status')->name('azlink');
    Route::post('/', 'ServerController@fetch');
});
