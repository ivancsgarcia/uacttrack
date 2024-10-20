<?php

use App\Http\Controllers\ActivityFormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExternalLinks;
use App\Http\Controllers\RequestFormController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function() {
    // Register
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    // Login
    Route::get('/login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store']);

    Route::inertia('/forgot-password', 'Auth/ForgotPassword')->name('forgot-password');
});

Route::middleware("auth")->group(function() {
    // Logout
    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    Route::get('/', [DashboardController::class, 'create'])->name('home');

    Route::get('/request-form', [RequestFormController::class, 'create'])->name('request-form');
    Route::get('/recommendation', [ExternalLinks::class, 'create'])->name('recommendation');
    
    Route::get('/submitted-apf', [ActivityFormController::class, 'fetchAll'])->name('submitted-apf');
    Route::get('/approved-apf', [ActivityFormController::class, 'fetchApproved'])->name('approved-apf');
    Route::get('/rejected-apf', [ActivityFormController::class, 'fetchRejected'])->name('rejected-apf');

    Route::inertia('/APF', 'APF')->name('apf');
    Route::get('/activity-form', [ActivityFormController::class, 'create'])->name('activity-form');
    Route::post('/activity-form', [ActivityFormController::class, 'store']);

    Route::get('/activity-form-preview/{activityId}', [ActivityFormController::class, 'show'])->name('activity-form-preview');
    // Route::inertia('/APF-whole', 'APFWhole')->name('apf-whole');


    Route::middleware('admin')->group(function() {
        Route::get('/admin-dashboard', [AdminController::class, 'getPending'])->name('admin-dashboard');
        Route::post('/activity-forms/{id}/status', [AdminController::class, 'updateStatus']);

        Route::get('/admin-approved-apf', [AdminController::class, 'getApproved'])->name('admin-approved-apf');
        Route::get('/admin-rejected-apf', [AdminController::class, 'getRejected'])->name('admin-rejected-apf');
        Route::get('/admin-revision', [AdminController::class, 'revision'])->name('admin-revision');
        Route::get('/admin-send-copy', [AdminController::class, 'copyReceiveBy'])->name('admin-send-copy');
    });
    

    Route::inertia('/{pathMatch}', 'notFound')->where('pathMatch', ".*");

});
