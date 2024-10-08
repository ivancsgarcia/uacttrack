<?php

use App\Http\Controllers\ActivityFormController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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
    Route::inertia('/recommendation', 'Recommendation')->name('recommendation');
    Route::inertia('/APF', 'APF')->name('apf');

    Route::get('/submitted-apf', [ActivityFormController::class, 'fetchAll'])->name('submitted-apf');
    Route::get('/approved-apf', [ActivityFormController::class, 'fetchApproved'])->name('approved-apf');
    Route::get('/rejected-apf', [ActivityFormController::class, 'fetchRejected'])->name('rejected-apf');

    Route::get('/activity-form', [ActivityFormController::class, 'create'])->name('activity-form');
    Route::post('/activity-form', [ActivityFormController::class, 'store']);

    Route::inertia('/APF-whole', 'APFWhole')->name('apf-whole');


    Route::middleware('admin')->group(function() {
        Route::get('/admin-dashboard', [ActivityFormController::class, 'fetchPendingAdmin'])->name('admin-dashboard');
        Route::post('/activity-forms/{id}/status', [ActivityFormController::class, 'updateStatus']);

        Route::get('/admin-approved-apf', [ActivityFormController::class, 'fetchApprovedAdmin'])->name('admin-approved-apf');
        Route::get('/admin-rejected-apf', [ActivityFormController::class, 'fetchRejectedAdmin'])->name('admin-rejected-apf');
        Route::inertia('/admin-revision', 'Admin/AdminRevision')->name('admin-revision');
        Route::inertia('/admin-send-copy', 'Admin/AdminSendCopy')->name('admin-send-copy');
    });
    

    Route::inertia('/{pathMatch}', 'notFound')->where('pathMatch', ".*");

});
