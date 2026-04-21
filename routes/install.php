<?php

use Azuriom\Http\Controllers\InstallController;
use Azuriom\Http\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;

$middleware = [
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    ShareErrorsFromSession::class,
];

Route::middleware($middleware)->group(function () {
    Route::get('/database', [InstallController::class, 'showDatabase'])->name('database');
    Route::post('/database', [InstallController::class, 'database']);
    Route::get('/games', [InstallController::class, 'showGames'])->name('games');
    Route::get('/game/{game}', [InstallController::class, 'showGame'])->name('game');
    Route::post('/game/{game}', [InstallController::class, 'setupGame']);
    Route::get('/finish', [InstallController::class, 'finishInstall'])->name('finish');
});
