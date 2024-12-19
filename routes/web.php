<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RuleController;

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

Route::middleware(['auth'])->group(function () {
    // Route untuk pengguna biasa
    Route::middleware(['role:user'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        // isi disini nanti route untuk halaman pengguna biasa
    });

    // Route untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        
        // CRUD Data Gejala
        Route::get('/gejala', [GejalaController::class, 'index'])->name('admin.gejala');
        Route::post('/gejala', [GejalaController::class, 'store'])->name('gejala.store');
        Route::put('/gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
        Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');

        // CRUD Data Penyakit
        Route::get('/penyakit', [PenyakitController::class, 'index'])->name('admin.penyakit');
        Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
        Route::put('/penyakit/{kode_penyakit}', [PenyakitController::class, 'update'])->name('penyakit.update');
        Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');

        // CRUD Knowledge Base
        Route::get('/basis-pengetahuan', [RuleController::class, 'index'])->name('aturan.index');
        Route::get('/basis-pengetahuan', [RuleController::class, 'create'])->name('rule.create');
        Route::post('/basis-pengetahuan/store', [RuleController::class, 'store'])->name('rule.store');
        Route::get('/basis-pengetahuan/{id}/edit', [RuleController::class, 'edit'])->name('rule.edit');
        Route::put('/basis-pengetahuan/{id}', [RuleController::class, 'update'])->name('rule.update');
        Route::delete('/basis-pengetahuan/{id}', [RuleController::class, 'destroy'])->name('rule.destroy');
    });
});

require __DIR__.'/auth.php';
