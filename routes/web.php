<?php

use App\Http\Controllers\ActivityFormController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function() {
    // Register
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Login
    Route::get('/login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store']);
});


Route::middleware("auth")->group(function() {
    // Logout
    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    Route::inertia('/', 'Dashboard')->name('home');

    Route::inertia('/request-form', 'RequestForm')->name('request-form');
    Route::inertia('/recommendation', 'Recommendation')->name('recommendation');
    Route::inertia('/APF', 'APF')->name('apf');

    Route::inertia('/submitted-form', 'SubmittedAPF')->name('submitted-form');
    Route::inertia('/approved-form', 'ApprovedAPF')->name('approved-form');
    Route::inertia('/rejected-form', 'RejectedAPF')->name('rejected-form');

    Route::inertia('/activity-form', 'ActivityForm')->name('activity-form');
    Route::post('/activity-form', [ActivityFormController::class, 'store']);

    Route::inertia('/APF-whole', 'APFWhole')->name('apf-whole');

    Route::inertia('/{pathMatch}', 'notFound')->where('pathMatch', ".*");

});
