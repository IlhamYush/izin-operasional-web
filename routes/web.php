<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SearchController;

// Landing Page - redirect to login if user is not authenticated
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest')->name('/');

Route::group(['middleware' => ['auth']], function () {
    // Home
    Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/entry', [EntryController::class, 'entry'])->name('entry');
        Route::post('/entry', [EntryController::class, 'store'])->name('entry.store'); // Updated to POST method
        Route::get('/update', [HomeController::class, 'update'])->name('update');
        Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring'); // Use MonitoringController for monitoring
        Route::get('/get-kantor-by-regional/{regional}', [EntryController::class, 'getKantorByRegional']);
        Route::get('/get-kantor-details/{nama_kantor}', [EntryController::class, 'getKantorDetails']);
        Route::get('/update', [DataController::class, 'edit'])->name('update.edit');
        Route::put('/update/{id}', [DataController::class, 'update'])->name('update.update');
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });

    // Monitoring Export Route
    Route::get('/monitoring/export', [MonitoringController::class, 'export'])->name('monitoring.export');
    Route::delete('/monitoring/delete', [MonitoringController::class, 'delete'])->name('monitoring.delete');

    // Other Routes
    Route::post('/home/submit', [DataController::class, 'submit'])->name('submit');
    Route::get('/home/get-perihal-by-nde', [DataController::class, 'getPerihalByNde'])->name('getPerihalByNde');
    Route::get('/home/get-perihal-by-nde-input', [DataController::class, 'getPerihalByNdeInput'])->name('getPerihalByNdeInput');

    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // Profile Routes
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile')->middleware('auth');

    Route::post('/profile/update-picture', [UserController::class, 'updateProfilePicture'])->name('profile.updatePicture')->middleware('auth');

    // Administrator Routes
    Route::group(['middleware' => ['role:Administrator']], function () {
        Route::group(['prefix' => 'users',  'as' => 'users.'], function () {
            Route::resource('/', UserController::class);
        });
    });
});

require __DIR__ . '/auth.php';
