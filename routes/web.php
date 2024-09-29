<?php

use App\Http\Controllers\ActivityFormController;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RequestFormController;
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

    Route::get('/request-form', [RequestFormController::class, 'create'])->name('request-form');
    Route::inertia('/recommendation', 'Recommendation')->name('recommendation');
    Route::inertia('/APF', 'APF')->name('apf');

    Route::get('/submitted-apf', [ActivityFormController::class, 'fetchAll'])->name('submitted-apf');
    Route::get('/approved-apf', [ActivityFormController::class, 'fetchApproved'])->name('approved-apf');
    Route::get('/rejected-apf', [ActivityFormController::class, 'fetchRejected'])->name('rejected-apf');

    Route::get('/activity-form', [ActivityFormController::class, 'create'])->name('activity-form');
    Route::post('/activity-form', [ActivityFormController::class, 'store']);

    Route::inertia('/APF-whole', 'APFWhole')->name('apf-whole');


    Route::inertia('/admin-dashboard', 'Admin/AdminDashboard')->name('admin-dashboard');
    Route::inertia('/admin-approved-apf', 'Admin/AdminApprovedAPF')->name('admin-approved-apf');
    Route::inertia('/admin-rejected-apf', 'Admin/AdminRejectedAPF')->name('admin-rejected-apf');
    Route::inertia('/admin-revision', 'Admin/AdminRevision')->name('admin-revision');
    Route::inertia('/admin-send-copy', 'Admin/AdminSendCopy')->name('admin-send-copy');


    Route::inertia('/{pathMatch}', 'notFound')->where('pathMatch', ".*");

});
