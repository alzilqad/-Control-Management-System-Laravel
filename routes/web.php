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
    Route::get('/company/{id}/services',  [companyController::class, 'service'])->name('company.service');
    Route::get('/company/{id}/proposals',  [companyController::class, 'proposal'])->name('company.proposal');

    Route::get('/company/{id}/notes',  [companyController::class, 'note'])->name('company.note');
    Route::post('/company/{id}/notes',  [companyController::class, 'createNote']);
    Route::get('/company/{id}/notes/delete/{id2}',  [companyController::class, 'deleteNote'])->name('company.note.delete');

    Route::get('/company/{id}/appointments',  [companyController::class, 'appointment'])->name('company.appointment');
    Route::post('/company/{id}/appointments',  [companyController::class, 'createAppointment']);
    Route::get('/company/{id}/appointments/delete/{id2}',  [companyController::class, 'deleteAppointment'])->name('company.appointment.delete');

    Route::get('/companylist', [companylistController::class, 'index'])->name('companylist.index');
    Route::get('/companylist/{id}',  [companylistController::class, 'lifecycle'])->name('companylist.lifecycle');
    Route::get('/companylist/{id}/services',  [companylistController::class, 'service'])->name('companylist.service');
    Route::get('/companylist/{id}/proposals',  [companylistController::class, 'proposal'])->name('companylist.proposal');
    
    Route::get('/proposal', [proposalController::class, 'index'])->name('proposal.index');

    Route::get('/service', [serviceController::class, 'index'])->name('service.index');
    
    Route::get('/chat', [chatController::class, 'index'])->name('chat.index');
    

});
