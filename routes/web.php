<?php

use Azuriom\Http\Controllers\Auth\LoginController;
use Azuriom\Http\Controllers\FallbackController;
use Azuriom\Http\Controllers\HomeController;
use Azuriom\Http\Controllers\NotificationController;
use Azuriom\Http\Controllers\PostCommentController;
use Azuriom\Http\Controllers\PostController;
use Azuriom\Http\Controllers\PostLikeController;
use Azuriom\Http\Controllers\ProfileController;
use Azuriom\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('user')->namespace('Azuriom\\Http\\Controllers')->group(function () {
    Auth::routes([
        'verify' => true,
        'register' => setting('register', true),
    ]);
});

Route::prefix('user')->group(function () {
    Route::get('/login/callback', [LoginController::class, 'handleProviderCallback'])->name('login.callback');

    Route::prefix('/2fa')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'showCodeForm'])->name('2fa');
        Route::post('/', [LoginController::class, 'verifyCode'])->name('2fa-verify');
    });
});

Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/search', [UserController::class, 'search'])->name('search');
});

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');

    Route::post('/theme', [ProfileController::class, 'theme'])->name('theme');

    Route::post('/email', [ProfileController::class, 'updateEmail'])->name('email');
    Route::post('/password', [ProfileController::class, 'updatePassword'])->name('password');
    Route::post('/name', [ProfileController::class, 'updateName'])->name('name');

    Route::prefix('2fa')->name('2fa.')->middleware('password.confirm')->group(function () {
        Route::get('/', [ProfileController::class, 'show2fa'])->name('index');
        Route::get('/codes', [ProfileController::class, 'download2faCodes'])->name('codes');

        Route::post('/enable', [ProfileController::class, 'enable2fa'])->name('enable');
        Route::post('/disable', [ProfileController::class, 'disable2fa'])->name('disable');
    });

    Route::prefix('delete')->name('delete.')->middleware('password.confirm')->group(function () {
        Route::get('/', [ProfileController::class, 'showDelete'])->name('index');

        Route::post('/send', [ProfileController::class, 'sendDelete'])->name('send');
        Route::get('/confirm', [ProfileController::class, 'showDeleteConfirm'])->name('confirm')
            ->middleware('signed');
        Route::post('/confirm', [ProfileController::class, 'confirmDelete'])
            ->middleware('signed');
    });

    Route::post('/money/transfer', [ProfileController::class, 'transferMoney'])->name('transfer-money');
});

Route::prefix('notifications')->name('notifications.')->middleware('auth')->group(function () {
    Route::post('/{notification}/read', [NotificationController::class, 'markAsRead'])->name('read');
    Route::post('/read', [NotificationController::class, 'markAllAsRead'])->name('read.all');
});

Route::prefix('news')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('show');

    Route::prefix('/{post}/like')->middleware('auth')->group(function () {
        Route::post('/', [PostLikeController::class, 'addLike'])->name('like');
        Route::delete('/', [PostLikeController::class, 'removeLike'])->name('dislike');
    });
});

Route::resource('posts.comments', PostCommentController::class)
    ->middleware(['auth', 'verified'])->only(['store', 'destroy']);

Route::get('/{path}', [FallbackController::class, 'get'])->where('path', '.*')->name('pages.show');
