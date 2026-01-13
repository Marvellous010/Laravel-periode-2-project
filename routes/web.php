<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InschrijvingController;
use App\Http\Controllers\KeuzedeelController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Public / Auth
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/registreren', [AuthController::class, 'showRegister']);
Route::post('/registreren', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/wachtwoord-vergeten', function () {
    return view('wachtwoord-vergeten');
});


Route::get('/dashboard', [KeuzedeelController::class, 'studentIndex'])
    ->name('student.dashboard');

Route::get('/keuzedelen/{id}', [KeuzedeelController::class, 'show'])
    ->name('keuzedeel.show');

Route::get('/inschrijvingen', [InschrijvingController::class, 'index'])
    ->middleware('auth')
    ->name('inschrijvingen.index');

Route::post('/inschrijven', [InschrijvingController::class, 'store'])
    ->middleware('auth')
    ->name('inschrijving.store');

Route::get('/presentatie', function () {
    return view('slb.presentatie');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Admin overzicht
    Route::get('/keuzedelen', [KeuzedeelController::class, 'index'])
        ->name('keuzedelen.index');

    // Admin create pagina (formulier)
    Route::get('/keuzedelen/toevoegen', function () {
        return view('admin.keuzedeel_toevoegen');
    })->name('keuzedelen.create');

    // Admin opslaan (POST)
    Route::post('/keuzedelen/toevoegen', [KeuzedeelController::class, 'store'])
        ->name('keuzedelen.store');

    Route::get('/overzicht', function () {
        return view('admin.overzicht');
    })->name('overzicht');

    Route::get('/instellingen', function () {
        return view('admin.instellingen');
    })->name('instellingen');

    Route::get('/studenten/inlezen', [StudentController::class, 'showImportForm'])
        ->name('studenten.inlezen');

    Route::post('/studenten/import', [StudentController::class, 'importCsv'])
        ->name('studenten.import');
});
