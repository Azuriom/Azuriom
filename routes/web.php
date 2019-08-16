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

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', 'ProfileController@index')->name('index');

    Route::post('/email', 'ProfileController@updateEmail')->name('email');
    Route::post('/password', 'ProfileController@updatePassword')->name('password');
});

Route::prefix('news')->name('posts.')->group(function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{post_slug}', 'PostController@show')->name('show');
});

Route::prefix('posts/likes')->name('posts.likes.')->middleware('auth')->group(function () {
    Route::post('/{post}/like', 'LikeController@addLike')->name('add');
    Route::post('/{post}/dislike', 'LikeController@removeLike')->name('remove');
});

Route::resource('posts.comments', 'CommentController')->middleware(['auth', 'verified'])->only('store', 'destroy');

Route::get('/{page_slug}', 'PageController@show')->name('pages.show');
