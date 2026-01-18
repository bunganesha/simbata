<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

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

Route::get('/dashboard', function () {
    return view('home.dashboard');
});

Route::prefix('tugas')->group(function () {
    Route::get('/', [TugasController::class, 'index'])->name('tugas.index');
    Route::get('/create', [TugasController::class, 'create'])->name('tugas.create');
    Route::post('/tugas/store', [TugasController::class, 'store'])->name('tugas.store');
    Route::get('/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
    Route::put('/{id}', [TugasController::class, 'update'])->name('tugas.update');
    Route::delete('/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');

    Route::get('/pengerjaan', [TugasController::class, 'pengerjaan'])->name('tugas.pengerjaan');
    Route::post('/', [TugasController::class, 'storePengerjaan'])->name('tugas.storePengerjaan');
    Route::post('/update-nilai/{id}', [TugasController::class, 'updateNilai'])->name('tugas.updateNilai');
    Route::get('/laporan', [TugasController::class, 'laporan'])->name('tugas.laporan');
});