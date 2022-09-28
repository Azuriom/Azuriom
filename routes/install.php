<?php

use Azuriom\Http\Controllers\InstallController;
use Illuminate\Support\Facades\Route;

$middleware = [
    \Azuriom\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
];

Route::middleware($middleware)->group(function () {
    Route::get('/database', [InstallController::class, 'showDatabase'])->name('database');
    Route::post('/database', [InstallController::class, 'database']);
    Route::get('/games', [InstallController::class, 'showGames'])->name('games');
    Route::get('/game/{game}', [InstallController::class, 'showGame'])->name('game');
    Route::post('/game/{game}', [InstallController::class, 'setupGame']);
    Route::get('/finish', [InstallController::class, 'finishInstall'])->name('finish');
});
