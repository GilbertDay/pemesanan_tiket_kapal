<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});


Route::middleware(['login', 'role:admin'])->prefix('admin/')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dahsboard']);
    Route::get('/penumpang', [AdminController::class, 'penumpang']);
    Route::get('/jadwal', [AdminController::class, 'jadwal']);
    Route::get('/speedboat', [AdminController::class, 'speedboat']);
    Route::get('/transaksi', [AdminController::class, 'transaksi']);

    // Tambah Data
    Route::post('/tambahJadwal', [AdminController::class, 'tambahJadwal']);
});

Route::post('/pesan/{id}', [App\Http\Controllers\BookingController::class, 'index'])->middleware('login');
Route::post('/tampil-list', [App\Http\Controllers\ListJadwalController::class, 'index']);
Route::post('/cek-login', [App\Http\Controllers\AuthentikasiController::class, 'cekLogin']);
Route::post('/tambah-user', [App\Http\Controllers\AuthentikasiController::class, 'tambahUser']);
Route::post('/logout', [App\Http\Controllers\AuthentikasiController::class, 'logout']);



