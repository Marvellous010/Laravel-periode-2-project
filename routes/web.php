<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

// Student Routes
Route::get('/dashboard', function () {
    return view('student_dashboard');
});

Route::get('/inschrijvingen', function () {
    return view('inschrijvingen');
});

Route::get('/keuzedelen', function () {
    return view('keuzedelen');
});

// SLB Routes
Route::get('/presentatie', function () {
    return view('slb.presentatie');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/keuzedelen', function () {
        return view('admin.keuzedelen');
    })->name('keuzedelen');

    Route::get('/keuzedelen/toevoegen', function () {
        return view('admin.keuzedeel_toevoegen');
    })->name('keuzedelen.toevoegen');

    Route::get('/overzicht', function () {
        return view('admin.overzicht');
    })->name('overzicht');

    Route::get('/instellingen', function () {
        return view('admin.instellingen');
    })->name('instellingen');

    Route::get('/studenten/inlezen', function () {
        return view('admin.student_inlezen');
    })->name('studenten.inlezen');
});
