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
use Inertia\Inertia;

Route::middleware("guest")->group(function () {
    // Login
    Route::get('/login', [AuthenticateController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'store']);

    // Register
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/forgot-password', [ResetPasswordController::class, 'requestPass'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetHandler'])->name('password.update');
});


Route::middleware("auth")->group(function () {
    // Logout
    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    Route::middleware(['role:Student Officer'])->group(function () {
        Route::get('/', [DashboardController::class, 'create'])->name('home');

        Route::get('/request-form', [RequestFormController::class, 'create'])->name('request-form');
        Route::get('/recommendation', [ExternalLinks::class, 'create'])->name('recommendation');

        Route::get('/submitted-apf', [ActivityFormController::class, 'fetchAll'])->name('submitted-apf');
        Route::get('/approved-apf', [ActivityFormController::class, 'fetchApproved'])->name('approved-apf');
        Route::get('/rejected-apf', [ActivityFormController::class, 'fetchRejected'])->name('rejected-apf');

        Route::get('/activity-form', [ActivityFormController::class, 'create'])->name('activity-form.create');
        Route::post('/activity-form', [ActivityFormController::class, 'store'])->name('activity-form.store');
        // Route::get('/activity-form/{id}', [ActivityFormController::class, 'show'])->name('activity-form.show');
        Route::get('/activity-form/{id}/edit', [ActivityFormController::class, 'edit'])->name('activity-form.edit');
        Route::put('/activity-form/{id}', [ActivityFormController::class, 'update'])->name('activity-form.update');
        Route::delete('/activity-form/{id}', [ActivityFormController::class, 'destroy'])->name('activity-form.destroy');

        Route::get('/activity-form-pdf/{id}', [ActivityFormPDFController::class, 'generatePDF'])->name('activity-form-pdf');
        Route::get('/api/events', [ActivityFormController::class, 'fetchEvents']);
    });

    Route::get('/activity-form/{id}', [ActivityFormController::class, 'show'])->name('activity-form.show');

    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::put('/activity-forms/{id}/status', [AdminController::class, 'updateStatus'])->name('activity-form.status');

        Route::get('/admin-pending-apf', [AdminController::class, 'getPending'])->name('admin-pending-apf');
        Route::get('/admin-approved-apf', [AdminController::class, 'getApproved'])->name('admin-approved-apf');
        Route::get('/admin-rejected-apf', [AdminController::class, 'getRejected'])->name('admin-rejected-apf');
    });

    Route::middleware(['vpa'])->group(function () {
        Route::get('/admin-send-copy', [AdminController::class, 'copyReceiveBy'])->name('admin-send-copy');
        Route::post('/activity-forms/{activityId}/update', [AdminController::class, 'sendCopy']);
    });

    Route::get('/download/{file}', [FileController::class, 'download'])->name('file.download');

    Route::fallback(function () {
        return Inertia::render('notFound');
    });
});
