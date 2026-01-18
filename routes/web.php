<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===================== LANDING PAGE (PUBLIC) =====================
Route::get('/', function () {
    return view('landing');
});

// ===================== AUTH =====================
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// ===================== ADMIN AREA (PROTECTED) =====================
Route::middleware(['adminauth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'index']);

    // ===================== ADMIN =====================
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/create', [AdminController::class, 'create']);
    Route::post('/admin/save', [AdminController::class, 'store']);
    Route::get('/admin/{id}/edit', [AdminController::class, 'show']);
    Route::post('/admin/{id}/update', [AdminController::class, 'update']);
    Route::get('/admin/{id}/delete', [AdminController::class, 'destroy']);

    // ======================= DOSEN =======================
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/create', [DosenController::class, 'create']);
    Route::post('/dosen', [DosenController::class, 'store']);
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit']);
    Route::put('/dosen/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy']);

    // =================== MATA KULIAH =====================
    Route::get('/mata-kuliah', [MataKuliahController::class, 'index']);
    Route::get('/mata-kuliah/create', [MataKuliahController::class, 'create']);
    Route::post('/mata-kuliah', [MataKuliahController::class, 'store']);
    Route::get('/mata-kuliah/{id}/edit', [MataKuliahController::class, 'edit']);
    Route::put('/mata-kuliah/{id}', [MataKuliahController::class, 'update']);
    Route::delete('/mata-kuliah/{id}', [MataKuliahController::class, 'destroy']);

    // ======================= KRS =========================
    Route::get('/krs', [KrsController::class, 'index']);
    Route::get('/krs/create', [KrsController::class, 'create']);
    Route::post('/krs', [KrsController::class, 'store']);
    Route::get('/krs/{id}/edit', [KrsController::class, 'edit']);
    Route::put('/krs/{id}', [KrsController::class, 'update']);
    Route::delete('/krs/{id}', [KrsController::class, 'destroy']);
});
