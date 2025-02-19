<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCalculatorController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/t', function () {
    return view('tdashboard');
});

Route::middleware(['web'])->group(function () {
    Route::get('/dashboard', [HealthCalculatorController::class, 'index'])->name('dashboard');
    Route::post('/calculate-health', [HealthCalculatorController::class, 'calculate'])->name('calculate.health');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


route::get('/cadastrar/salvar',[App\http\controllers\registrarAtividadeControler::class, 'store']);

require __DIR__.'/auth.php';