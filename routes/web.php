<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RiwayatController;

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
        // Nanti pindahin ke user kalo udah ada login
        Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('/user/diagnosa', [DiagnosaController::class, 'index'])->name('user.diagnosa');
        Route::get('/user/riwayat-diagnosa', [RiwayatController::class, 'index'])->name('user.riwayat');
        Route::get('/user/riwayat-diagnosa/detail/{id_hasil}', [RiwayatController::class, 'detail'])->name('user.detail');
        Route::post('/user/inference', [DiagnosaController::class, 'process'])->name('diagnosa.inference');

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

        // CRUD Data Knowledge Base
        Route::get('/basis-pengetahuan', [RuleController::class, 'index'])->name('aturan.index');
        Route::get('/basis-pengetahuan/create', [RuleController::class, 'create'])->name('aturan.create');
        Route::post('/basis-pengetahuan/store', [RuleController::class, 'store'])->name('aturan.store');
        Route::get('/basis-pengetahuan/{id}/edit', [RuleController::class, 'edit'])->name('aturan.edit');
        Route::put('/basis-pengetahuan/{id}', [RuleController::class, 'update'])->name('aturan.update');
        Route::delete('/basis-pengetahuan/{id}', [RuleController::class, 'destroy'])->name('aturan.destroy');
    });
});

require __DIR__.'/auth.php';
