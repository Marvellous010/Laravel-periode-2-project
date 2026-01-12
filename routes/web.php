<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InschrijvingController;
use App\Models\Keuzedeel;

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

use App\Http\Controllers\TestController;

Route::get('/db-test', [TestController::class, 'index']);
use App\Http\Controllers\KeuzedeelController;


Route::get('/keuzedelen/toevoegen', function () {
    return view('admin.keuzedeel_toevoegen');
})->name('admin.keuzedelen.create');

Route::post('/keuzedelen/toevoegen', [KeuzedeelController::class, 'store'])
    ->name('admin.keuzedelen.store');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/registreren', [AuthController::class, 'showRegister']);

Route::post('/registreren', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/wachtwoord-vergeten', function () {
    return view('wachtwoord-vergeten');
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

    Route::get('/keuzedelen', [KeuzedeelController::class, 'index'])
        ->name('admin.keuzedelen.index');


    Route::post('/keuzedelen/toevoegen', [KeuzedeelController::class, 'store'])
        ->name('admin.keuzedelen.store');



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

Route::post('/inschrijven', [InschrijvingController::class, 'store'])
    ->middleware('auth')
    ->name('inschrijving.store');
    
    Route::get('/keuzedelen/{id}', function ($id) {
    $keuzedeel = Keuzedeel::findOrFail($id);
    return view('keuzedelen', compact('keuzedeel'));
})->name('keuzedeel.show');
