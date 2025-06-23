<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EstateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;

Route::get('/', function () {
    return view('web.welcome');
});

//Admin Routes


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/add_estate', function () {
        return view('admin.add_estate');
    })->name('estate');

    Route::resource('users', UserController::class);
    Route::resource('estate', EstateController::class);

    Route::get('/myprofile',  [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/myprofile',  [ProfileController::class, 'update'])->name('profile.update');
});
