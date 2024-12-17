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
use App\Http\Controllers\CounselingController;

Route::get('/', [CounselingController::class, 'showExpertSystem'])->name('home');


Route::post('/save-consultation', [CounselingController::class, 'saveConsultation'])->name('save.consultation');


