<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('laporan.form');
});

Route::get('/banjir', [LaporanController::class, 'form'])->name('laporan.form');
Route::get('/proses', fn () => redirect()->route('laporan.form'))->name('laporan.proses');
Route::post('/proses', [LaporanController::class, 'kirim'])->name('laporan.kirim');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => redirect()->route('laporan.daftar'))->name('dashboard');
    Route::get('/laporan', [LaporanController::class, 'daftar'])->name('laporan.daftar');
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
