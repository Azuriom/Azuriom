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

Route::get('/settings', 'SettingsController@index')->name('settings.index');
Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

Route::get('/settings/security', 'SettingsController@security')->name('settings.security');
Route::post('/settings/security/update', 'SettingsController@updateSecurity')->name('settings.update-security');

Route::post('/users/{user}/verify', 'UserController@verifyEmail')->name('users.verify');

Route::resource('users', 'UserController')->except('show');

Route::resource('roles', 'RoleController')->except('show');

Route::resource('images', 'ImageController')->except('show');

Route::resource('posts', 'PostController')->except('show');
Route::resource('pages', 'PageController')->except('show');
