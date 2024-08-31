<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Login');
})->name('login');

Route::get('/register', function () {
    return inertia('Register');
})->name('register');

Route::get('/home', function () {
    return inertia('Dashboard');
})->name('home');

Route::get('/request-form', function () {
    return inertia('RequestForm');
})->name('request-form');

Route::get('/recommendation', function () {
    return inertia('Recommendation');
})->name('recommendation');

Route::get('/APF', function () {
    return inertia('APF');
})->name('apf');

Route::get('/APF-1', function () {
    return inertia('APF1');
})->name('apf-1');

Route::get('/APF-2', function () {
    return inertia('APF2');
})->name('apf-2');

Route::get('/APF-3', function () {
    return inertia('APF3');
})->name('apf-3');

Route::get('/APF-whole', function () {
    return inertia('APFWhole');
})->name('apf-whole');

Route::get('/{pathMatch}', function () {
    return inertia('notFound');
}) -> where('pathMatch', ".*");