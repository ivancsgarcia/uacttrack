<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Login')->name('login');

Route::inertia('/register', 'Register')->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::inertia('/home', 'Dashboard')->name('home');

Route::inertia('/request-form', 'RequestForm')->name('request-form');

Route::inertia('/recommendation', 'Recommendation')->name('recommendation');

Route::inertia('/APF', 'APF')->name('apf');

Route::inertia('/APF-1', 'APF1')->name('apf-1');

Route::inertia('/APF-2', 'APF2')->name('apf-2');

Route::inertia('/APF-3', 'APF3')->name('apf-3');

Route::inertia('/APF-whole', 'APFWhole')->name('apf-whole');

Route::inertia('/{pathMatch}', 'notFound')->where('pathMatch', ".*");