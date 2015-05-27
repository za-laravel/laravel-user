<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

Route::model('user', Config::get('auth.model'));
Route::resource('user', 'ZaLaravel\LaravelUser\Controllers\AdminUserController');