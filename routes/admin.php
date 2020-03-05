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
    Route::get('/test', 'DiscordController@testWebhook')->name('test');

    Route::get('/security', 'SettingsController@security')->name('security');
    Route::post('/security/update', 'SettingsController@updateSecurity')->name('update-security');

    Route::post('/cache/clear', 'SettingsController@clearCache')->name('cache.clear');
    Route::post('/cache/advanced/enable', 'SettingsController@enableAdvancedCache')->name('cache.advanced.enable');
    Route::post('/cache/advanced/clear', 'SettingsController@disableAdvancedCache')->name('cache.advanced.clear');

    Route::get('/performance', 'SettingsController@performance')->name('performance');
    Route::post('/performance/update', 'SettingsController@updatePerformance')->name('update-performance');
    Route::get('/storage/link', 'SettingsController@linkStorage')->name('link-storage');

    Route::get('/seo', 'SettingsController@seo')->name('seo');
    Route::post('/seo/update', 'SettingsController@updateSeo')->name('update-seo');

    Route::get('/mail', 'SettingsController@mail')->name('mail');
    Route::post('/mail/update', 'SettingsController@updateMail')->name('update-mail');

    Route::get('/maintenance', 'SettingsController@maintenance')->name('maintenance');
    Route::post('/maintenance/update', 'SettingsController@updateMaintenance')->name('update-maintenance');
});

Route::prefix('users')->name('users.')->middleware('can:admin.users')->group(function () {
    Route::post('/{user}/verify', 'UserController@verifyEmail')->name('verify');
    Route::post('/{user}/2fa', 'UserController@disable2fa')->name('2fa');
});

Route::prefix('themes')->name('themes.')->middleware('can:admin.themes')->group(function () {
    Route::get('/', 'ThemeController@index')->name('index');
    Route::post('/change/{theme?}', 'ThemeController@changeTheme')->name('change');
    Route::get('/{theme}/config', 'ThemeController@edit')->name('edit');
    Route::post('/{theme}/config', 'ThemeController@config')->name('config');
    Route::post('/{theme}/update', 'ThemeController@update')->name('update');
    Route::post('/{themeId}/download', 'ThemeController@download')->name('download');
    Route::delete('/{theme}', 'ThemeController@delete')->name('delete');
});

Route::prefix('plugins')->name('plugins.')->middleware('can:admin.plugins')->group(function () {
    Route::get('/', 'PluginController@index')->name('index');
    Route::post('/reload', 'PluginController@reload')->name('reload');
    Route::post('/{plugin}/enable', 'PluginController@enable')->name('enable');
    Route::post('/{plugin}/disable', 'PluginController@disable')->name('disable');
    Route::post('/{plugin}/update', 'PluginController@update')->name('update');
    Route::post('/{pluginId}/download', 'PluginController@download')->name('download');
    Route::delete('/{plugin}', 'PluginController@delete')->name('delete');
});

Route::prefix('update')->name('update.')->middleware('can:admin.update')->group(function () {
    Route::get('/', 'UpdateController@index')->name('index');
    Route::post('/fetch', 'UpdateController@fetch')->name('fetch');
    Route::post('/download', 'UpdateController@download')->name('download');
    Route::post('/install', 'UpdateController@install')->name('install');
});

Route::resource('navbar-elements', 'NavbarController')->except('show')->middleware('can:admin.navbar');
Route::post('/navbar-elements/order', 'NavbarController@updateOrder')->name('navbar-elements.update-order')->middleware('can:admin.navbar');

Route::resource('users', 'UserController')->except('show')->middleware('can:admin.users');
Route::resource('roles', 'RoleController')->except('show')->middleware('can:admin.roles');
Route::post('/roles/power', 'RoleController@updatePower')->name('roles.update-power')->middleware('can:admin.roles');

Route::resource('bans', 'BanController')->only('index')->middleware('can:admin.users');
Route::resource('users.bans', 'BanController')->only(['store', 'destroy'])->middleware('can:admin.users');

Route::resource('pages', 'PageController')->except('show')->middleware('can:admin.pages');
Route::resource('posts', 'PostController')->except('show')->middleware('can:admin.posts');
Route::resource('images', 'ImageController')->except('show')->middleware('can:admin.images');

Route::resource('servers', 'ServerController')->except('show');
Route::post('/servers/{server}/verify/azlink', 'ServerController@verifyAzLink')->name('servers.verify-azlink');
Route::post('/servers/default', 'ServerController@changeDefault')->name('servers.change-default');

Route::post('logs/clear', 'ActionLogController@clear')->name('logs.clear')->middleware('can:admin.logs');
Route::resource('logs', 'ActionLogController')->only(['index'])->middleware('can:admin.logs');

Route::fallback('AdminController@fallback');
