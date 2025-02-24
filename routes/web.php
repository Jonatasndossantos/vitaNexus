<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCalculatorController;
use App\Http\Controllers\HealthDataController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/t', function () {
    return view('tdashboard');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/bemEstar', function () {
    return view('bemEstar');
})->name('bemEstar');

Route::middleware(['web'])->group(function () {
    Route::get('/home', [HealthCalculatorController::class, 'index'])->name('home');
    
});

Route::middleware('auth')->group(function () { // middleware('auth') é usado para autenticar o usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/home', [HealthDataController::class, 'index'])->name('home');

    Route::post('/health/store', [HealthDataController::class, 'store'])->name('health.store');
    Route::get('/health/{id}', [HealthDataController::class, 'show'])->name('health.show');
    Route::delete('/health/{id}', [HealthDataController::class, 'destroy'])->name('health.destroy');

    Route::get('/history', [HealthDataController::class, 'history'])->name('history');
    Route::get('/edit/{id}', [HealthDataController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [HealthDataController::class, 'update'])->name('update');

    Route::get('/health/toggle-form', [HealthDataController::class, 'toggleForm'])->name('toggleForm');

    Route::delete('/delete/{id}', [HealthDataController::class, 'destroy'])->name('delete');

});


require __DIR__.'/auth.php';