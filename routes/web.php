<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('web.welcome');});
Route::get('/dashboard', function () {return view('admin.dashboard');});
