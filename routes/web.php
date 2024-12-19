<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::middleware(['auth'])->group(function () {
    // Route untuk pengguna biasa
    Route::middleware(['role:user'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        // isi disini nanti route untuk halaman pengguna biasa
    });

    // Route untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
         // isi disini nanti route untuk halaman admin
    });
});

require __DIR__.'/auth.php';
