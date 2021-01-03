<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\clientUser\loginController;
use App\Http\Controllers\clientUser\logoutController;
use App\Http\Controllers\clientUser\homeController;

Route::get('/', function () {
    return view('clientUser.main');
});

Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'verify']);
Route::get('/logout', [logoutController::class, 'index'])->name('logout.index');

Route::get('/home', [homeController::class, 'index'])->name('home.index');
