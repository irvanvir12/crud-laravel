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
Route::resource('/mahasiswa', MahasiswaController::class);
Route::resource('/jenisketerangan', JenisKeteranganController::class);
Route::resource('/status', StatusController::class);
Route::resource('/jenjang', JenjangController::class);
Route::resource('/history', HistoryController::class);


