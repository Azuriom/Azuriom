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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('user')->group(function () {
    Auth::routes(['verify' => true]);
});

Route::prefix('news')->name('posts.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{post_slug}', 'PostController@show')->name('show');
});
