<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

Route::model('user', Config::get('auth.model'));
Route::resource('/admin/user', 'ZaLaravel\LaravelUser\Controllers\AdminUserController');

Route::post('/admin/user/{user}/block', [
    'uses' => 'ZaLaravel\LaravelUser\Controllers\AdminUserController@block',
    'as' => 'admin.user.block',
]);