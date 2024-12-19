<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CounselingController;
use App\Models\Symptom;
use App\Models\Rule;
use App\Models\Solution;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarKonsultasiController;
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

// Rute Halaman Utama
Route::get('/', [CounselingController::class, 'showExpertSystem'])->name('home');

// Rute Simpan Konsultasi
Route::post('/save-consultation', [CounselingController::class, 'saveConsultation'])->name('save.consultation');

// Rute Dashboard (Laravel Breeze)
Route::get('/dashboard', function () {
    // From database
    $symptoms = Symptom::all();
    $rules = Rule::all();
    $solutions = Solution::all();

    return view('dashboard', compact('symptoms', 'rules', 'solutions')); // Halaman dashboard utama
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk Menambahkan pakar.blade.php ke Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/pakar', function () {
        return view('pakar'); // Mengarahkan ke halaman pakar.blade.php
    })->name('dashboard.pakar');

    // Rute Profile dari Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  
Route::delete('/konsultasi/{id}', [DaftarKonsultasiController::class, 'destroy'])->name('konsultasi.destroy');

Route::get('/daftarkonsultasi', [DaftarKonsultasiController::class, 'index'])->name('daftarkonsultasi');

});

require __DIR__.'/auth.php';