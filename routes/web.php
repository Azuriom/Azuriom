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

use Illuminate\Support\Facades\Route;

Route::pattern('id', '\d+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('name', '[a-z0-9_-]{3,16}');

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('user')->group(function () {
    Auth::routes(['verify' => true]);
});

Route::prefix('news')->name('posts.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{slug}', 'PostController@show')->name('show');
});
