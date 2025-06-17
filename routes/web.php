<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JenisKeteranganController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return view('home');
});

// Route Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::resource('jenisketerangan', JenisKeteranganController::class);
Route::resource('/status', StatusController::class);
Route::resource('jenjang', JenjangController::class);
Route::resource('/history', HistoryController::class);
Route::get('/history/create', [HistoryController::class, 'create'])->name('history.create');
Route::post('/history', [HistoryController::class, 'store'])->name('history.store');
Route::get('/history/{id}/edit', [HistoryController::class, 'edit'])->name('history.edit');
Route::put('/history/{id}', [HistoryController::class, 'update'])->name('history.update');
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');

