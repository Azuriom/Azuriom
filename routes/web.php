<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/maintenance', 'HomeController@maintenance')->name('maintenance');

Route::prefix('user')->group(function () {
    Auth::routes([
        'verify' => true,
        'register' => setting('register', true),
    ]);

    Route::prefix('/2fa')->group(function () {
        Route::get('/', 'Auth\LoginController@show2fa')->name('login.2fa');
        Route::post('/', 'Auth\LoginController@login2fa');
    });
});

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', 'ProfileController@index')->name('index');

    Route::post('/email', 'ProfileController@updateEmail')->name('email');
    Route::post('/password', 'ProfileController@updatePassword')->name('password');

    Route::prefix('2fa')->name('2fa.')->group(function () {
        Route::get('/', 'ProfileController@show2fa')->name('index');

        Route::post('/', 'ProfileController@enable2fa')->name('enable');
        Route::post('/disable', 'ProfileController@disable2fa')->name('disable');
    });
});

Route::prefix('news')->name('posts.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{post:slug}', 'PostController@show')->name('show');

    Route::prefix('/{post}/like')->middleware('auth')->group(function () {
        Route::post('/', 'PostLikeController@addLike')->name('like');
        Route::delete('/', 'PostLikeController@removeLike')->name('dislike');
    });
});

Route::resource('posts.comments', 'PostCommentController')->middleware(['auth', 'verified'])->only('store', 'destroy');

Route::get('/{page:slug}', 'PageController@show')->name('pages.show');
