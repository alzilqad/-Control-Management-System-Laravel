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
use App\Http\Controllers\clientUser\ApiController;

Route::get('/', function () {
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', 'GET https://www.googleapis.com/customsearch/v1?key=INSERT_YOUR_API_KEY&cx=017576662512468239146:omuauf_lfve&q=lectures', [
        'auth' => ['user', 'pass']
        //return view('clientUser.main');
    ]);
});

Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'verify']);
Route::get('/logout', [logoutController::class, 'index'])->name('logout.index');

Route::get('/registration', [registrationController::class, 'index'])->name('registration.index');
Route::post('/registration', [registrationController::class, 'create']);

Route::group(['middleware' => ['session']], function () {
    Route::get('/home', [homeController::class, 'index'])->name('home.index');


    //profile routes
    Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [profileController::class, 'edit'])->name('profile.edit.index');
    Route::post('/profile/edit', [profileController::class, 'update']);
    //end of profile routes

    //affiliated company routes
    Route::get('/company', [companyController::class, 'index'])->name('company.index');
    Route::get('/company/{id}',  [companyController::class, 'lifecycle'])->name('company.lifecycle');
    Route::get('/company/{id}/services',  [companyController::class, 'service'])->name('company.service');

    Route::get('/company/{id}/proposals',  [companyController::class, 'proposal'])->name('company.proposal');
    Route::get('/company/{id}/proposals/optup/{id2}',  [companyController::class, 'optUpProposal'])->name('company.proposal.optup');
    Route::get('/company/{id}/proposals/approve/{id2}',  [companyController::class, 'approveProposal'])->name('company.proposal.approve');

    Route::post('/company/{id}/notes',  [companyController::class, 'createNote'])->name('company.note.create');
    Route::get('/company/{id}/notes',  [companyController::class, 'readNote'])->name('company.note');
    Route::put('/company/{id}/notes/{id2}',  [companyController::class, 'updateNote'])->name('company.note.update');;
    Route::get('/company/{id}/notes/delete/{id2}',  [companyController::class, 'deleteNote'])->name('company.note.delete');

    Route::post('/company/{id}/appointments',  [companyController::class, 'createAppointment'])->name('company.appointment.create');
    Route::get('/company/{id}/appointments',  [companyController::class, 'readAppointment'])->name('company.appointment');
    Route::put('/company/{id}/appointments/{id2}',  [companyController::class, 'updateAppointment'])->name('company.appointment.update');
    Route::get('/company/{id}/appointments/delete/{id2}',  [companyController::class, 'deleteAppointment'])->name('company.appointment.delete');
    //end of affiliated company routes


    //companylist routes
    Route::get('/companylist', [companylistController::class, 'index'])->name('companylist.index');
    Route::get('/companylist/{id}',  [companylistController::class, 'lifecycle'])->name('companylist.lifecycle');
    Route::get('/companylist/{id}/services',  [companylistController::class, 'service'])->name('companylist.service');
    Route::get('/companylist/{id}/proposals',  [companylistController::class, 'proposal'])->name('companylist.proposal');
    Route::get('/companylist/{id}/proposals/optup/{id2}',  [companylistController::class, 'optUpProposal'])->name('companylist.proposal.optup');
    Route::get('/companylist/{id}/proposals/approve/{id2}',  [companylistController::class, 'approveProposal'])->name('companylist.proposal.approve');
    //end of companylist routes


    //proposal routes
    Route::get('/proposal', [proposalController::class, 'index'])->name('proposal.index');
    Route::get('/proposal/optup/{id}',  [proposalController::class, 'optUpProposal'])->name('proposal.optup');
    Route::get('/proposal/approve/{id}',  [proposalController::class, 'approveProposal'])->name('proposal.approve');
    //end of proposal routes


    //service routes
    Route::get('/service', [serviceController::class, 'index'])->name('service.index');
    //end of service routes


    //chat routes
    Route::get('/chat', [chatController::class, 'index'])->name('chat.index');
    //end of chat routes


    //transaction routes
    Route::get('transaction', [ApiController::class, 'getAllTransactions']);
    Route::post('transaction', [ApiController::class, 'createTransaction']);
    //end of transaction routes

});
