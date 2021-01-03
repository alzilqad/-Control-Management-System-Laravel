<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\clientUser\loginController;
use App\Http\Controllers\clientUser\logoutController;
use App\Http\Controllers\clientUser\registrationController;
use App\Http\Controllers\clientUser\homeController;
use App\Http\Controllers\clientUser\profileController;

Route::get('/', function () {
    return view('clientUser.main');
});

Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'verify']);
Route::get('/logout', [logoutController::class, 'index'])->name('logout.index');

Route::get('/registration', [registrationController::class, 'index'])->name('registration.index');
Route::post('/registration', [registrationController::class, 'create']);

Route::group(['middleware' => ['session']], function () {
    Route::get('/home', [homeController::class, 'index'])->name('home.index');

    Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [profileController::class, 'edit'])->name('profile.edit.index');
    Route::post('/profile/edit', [profileController::class, 'update']);
});
