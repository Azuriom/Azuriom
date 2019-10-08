<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" and "admin" middleware groups. Now create a great admin panel !
|
*/

Route::get('/', 'AdminController@index')->name('dashboard');

Route::prefix('settings')->name('settings.')->middleware('can:admin.settings')->group(function () {
    Route::get('/', 'SettingsController@index')->name('index');
    Route::post('/update', 'SettingsController@update')->name('update');

    Route::get('/security', 'SettingsController@security')->name('security');
    Route::post('/security/update', 'SettingsController@updateSecurity')->name('update-security');

    Route::post('/cache/clear', 'SettingsController@clearCache')->name('cache.clear');
    Route::post('/cache/advanced/enable', 'SettingsController@enableAdvancedCache')->name('cache.advanced.enable');
    Route::post('/cache/advanced/clear', 'SettingsController@disableAdvancedCache')->name('cache.advanced.clear');

    Route::get('/performance', 'SettingsController@performance')->name('performance');
    Route::post('/performance/update', 'SettingsController@updatePerformance')->name('update-performance');

    Route::get('/seo', 'SettingsController@seo')->name('seo');
    Route::post('/seo/update', 'SettingsController@updateSeo')->name('update-seo');

    Route::get('/maintenance', 'SettingsController@maintenance')->name('maintenance');
    Route::post('/maintenance/update', 'SettingsController@updateMaintenance')->name('update-maintenance');
});

Route::prefix('users')->name('users.')->middleware('can:admin.users')->group(function () {
    Route::post('/{user}/verify', 'UserController@verifyEmail')->name('verify');
    Route::post('/{user}/2fa', 'UserController@disable2fa')->name('2fa');
});

Route::prefix('themes')->name('themes.')->middleware('admin')->group(function () {
    Route::get('/', 'ThemeController@index')->name('index');
    Route::post('/change/{theme?}', 'ThemeController@changeTheme')->name('change');
    Route::get('/edit', 'ThemeController@edit')->name('edit');
    Route::post('/update', 'ThemeController@update')->name('update');
});

Route::resource('navbar-elements', 'NavbarController')->except('show')->middleware('can:admin.navbar');
Route::post('/navbar-elements/order', 'NavbarController@updateOrder')->name('navbar-elements.update-order')->middleware('can:admin.navbar');

Route::resource('users', 'UserController')->except('show')->middleware('can:admin.users');
Route::resource('roles', 'RoleController')->except('show')->middleware('can:admin.roles');

Route::resource('bans', 'BanController')->only('index')->middleware('can:admin.users');
Route::resource('users.bans', 'BanController')->only(['store', 'destroy'])->middleware('can:admin.users');

Route::resource('pages', 'PageController')->except('show')->middleware('can:admin.pages');
Route::resource('posts', 'PostController')->except('show')->middleware('can:admin.posts');
Route::resource('images', 'ImageController')->except('show')->middleware('can:admin.images');

Route::post('logs/clear', 'ActionLogController@clear')->name('logs.clear')->middleware('can:admin.logs');
Route::resource('logs', 'ActionLogController')->only(['index'])->middleware('can:admin.logs');
