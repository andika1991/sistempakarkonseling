<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CounselingController;
use App\Http\Controllers\FaqGroupController;
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

// Halaman Welcome (Log Out)
Route::get('/', function () {
    return view('welcome'); // Default Laravel Breeze Welcome Page
})->name('home');

// Rute FAQ
Route::get('/faq', function () {
    return view('faq'); // Menampilkan halaman FAQ
})->name('faq');

// Rute Halaman Pakar
Route::get('/pakar', [CounselingController::class, 'showExpertSystem'])->name('pakar');

// Rute Simpan Konsultasi
Route::post('/save-consultation', [CounselingController::class, 'saveConsultation'])->name('save.consultation');

// Rute Dashboard (Laravel Breeze)
Route::get('/dashboard', function () {
    // Ambil data dari database
    $symptoms = Symptom::all();
    $rules = Rule::all();
    $solutions = Solution::all();

    return view('dashboard', compact('symptoms', 'rules', 'solutions')); // Halaman dashboard utama
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute Grup dengan Middleware Auth
Route::middleware(['auth'])->group(function () {
    // Halaman Pakar di Dashboard
    Route::get('/dashboard/pakar', [CounselingController::class, 'showExpertSystem'])->name('dashboard.pakar');

    // Profile dari Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Daftar Konsultasi
    Route::get('/daftarkonsultasi', [DaftarKonsultasiController::class, 'index'])->name('daftarkonsultasi');
    Route::delete('/konsultasi/{id}', [DaftarKonsultasiController::class, 'destroy'])->name('konsultasi.destroy');

    // FAQ
    Route::get('/faq', [FaqGroupController::class, 'index'])->name('faq');
    Route::post('/faq/groups', [FaqGroupController::class, 'store'])->name('faq.groups.store');
    Route::get('/faq/groups/{id}/edit', [FaqGroupController::class, 'edit'])->name('faq.groups.edit');
    Route::patch('/faq/groups/{id}', [FaqGroupController::class, 'update'])->name('faq.groups.update');
    Route::delete('/faq/groups/{id}', [FaqGroupController::class, 'destroy'])->name('faq.groups.destroy');
});

// Include Auth Routes
require __DIR__.'/auth.php';
