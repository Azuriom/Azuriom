<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Internal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register internal routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| don't have any middleware group assigned. Stay safe !
|
*/

Route::get('/assets/{file}', 'HomeController@assets')->where('file', '.*')->name('assets');
