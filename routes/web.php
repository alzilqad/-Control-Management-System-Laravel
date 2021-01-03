<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\clientUser\loginController;
use App\Http\Controllers\clientUser\logoutController;
use App\Http\Controllers\clientUser\registrationController;
use App\Http\Controllers\clientUser\homeController;
use App\Http\Controllers\clientUser\profileController;
use App\Http\Controllers\clientUser\companyController;
use App\Http\Controllers\clientUser\companylistController;
use App\Http\Controllers\clientUser\proposalController;
use App\Http\Controllers\clientUser\serviceController;
use App\Http\Controllers\clientUser\chatController;

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

    Route::get('/company', [companyController::class, 'index'])->name('company.index');
    Route::get('/company/{id}',  [companyController::class, 'lifecycle'])->name('company.lifecycle');

    Route::get('/companylist', [companylistController::class, 'index'])->name('companylist.index');
    Route::get('/companylist/{id}',  [companylistController::class, 'lifecycle'])->name('companylist.lifecycle');

    Route::get('/proposal', [proposalController::class, 'index'])->name('proposal.index');
    
    Route::get('/service', [serviceController::class, 'index'])->name('service.index');
    
    Route::get('/chat', [chatController::class, 'index'])->name('chat.index');
    

});
