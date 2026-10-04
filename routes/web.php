<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LogistikController;
use Illuminate\Support\Facades\Route;
// 1. Redirect URL utama '/' langsung ke form lapor
Route::redirect('/', '/lapor');

// 2. Route Fitur Lapor Banjir
Route::get('/lapor', 'App\\Http\\Controllers\\DataController@index')->name('lapor.form');
Route::post('/lapor', [DataController::class, 'proses'])->name('lapor.proses');

// (Opsional) Jika route daftar laporan sudah siap di controller:
Route::get('/lapor/daftar', [DataController::class, 'daftar'])->name('lapor.daftar');

// 3. Route Fitur Logistik
Route::get('/logistik', [LogistikController::class, 'index'])->name('logistik.index');
Route::post('/logistik/hitung', [LogistikController::class, 'hitung'])->name('logistik.hitung');

// 4. Route Test JSON (kalau masih dipakai)
Route::get('/test', function () {
    return response()->json([
        'nama' => 'John Doe',
        'usia' => 25,
        'pekerjaan' => 'Programmer'
    ]);
});