<?php

use App\Http\Controllers\ActivityFormController;
use App\Http\Controllers\ActivityFormPDFController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExternalLinks;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    // Login
    Route::get('/login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store']);

    // Route::inertia('/forgot-password', 'Auth/ForgotPassword')->name('forgot-password');
    Route::inertia('/forgot-password', 'Auth/ForgotPassword')->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});


Route::middleware("auth")->group(function () {
    // Register
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    // Logout
    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    Route::get('/', [DashboardController::class, 'create'])->name('home');

    Route::get('/request-form', [RequestFormController::class, 'create'])->name('request-form');
    Route::get('/recommendation', [ExternalLinks::class, 'create'])->name('recommendation');

    Route::get('/submitted-apf', [ActivityFormController::class, 'fetchAll'])->name('submitted-apf');
    Route::get('/approved-apf', [ActivityFormController::class, 'fetchApproved'])->name('approved-apf');
    Route::get('/rejected-apf', [ActivityFormController::class, 'fetchRejected'])->name('rejected-apf');

    Route::get('/activity-form', [ActivityFormController::class, 'create'])->name('activity-form.create');
    Route::post('/activity-form', [ActivityFormController::class, 'store'])->name('activity-form.store');
    Route::get('/activity-form/{activityId}', [ActivityFormController::class, 'show'])->name('activity-form.show');
    Route::get('/activity-form/{activityId}/edit', [ActivityFormController::class, 'edit'])->name('activity-form.edit');

    Route::get('/activity-form-pdf/{activityId}', [ActivityFormPDFController::class, 'generatePDF'])->name('activity-form-pdf');


    Route::middleware(['admin'])->group(function () {
        Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::post('/activity-forms/{id}/status', [AdminController::class, 'updateStatus']);

        Route::get('/admin-pending-apf', [AdminController::class, 'getPending'])->name('admin-pending-apf');
        Route::get('/admin-approved-apf', [AdminController::class, 'getApproved'])->name('admin-approved-apf');
        Route::get('/admin-rejected-apf', [AdminController::class, 'getRejected'])->name('admin-rejected-apf');
    });

    Route::middleware(['vpa'])->group(function () {
        Route::get('/admin-send-copy', [AdminController::class, 'copyReceiveBy'])->name('admin-send-copy');
        Route::post('/activity-forms/{activityId}/update', [AdminController::class, 'sendCopy']);
    });

    Route::get('/download/{file}', [FileController::class, 'download'])->name('file.download');

    Route::inertia('/{pathMatch}', 'notFound')->where('pathMatch', ".*");
});
