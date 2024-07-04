<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\RiwayatPemesanan;


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
    Route::get('/metodePembayaran', [AdminController::class, 'metodePembayaran']);
    // Tambah Data Jadwal
    Route::post('/tambahJadwal', [AdminController::class, 'tambahJadwal']);
    //Edit Data Jadwal
    //Hapus Data Jadwal
    // Tambah Data Speedboat
    Route::post('/tambahSpeedboat', [AdminController::class, 'tambahSpeedboat']);
    //Edit Data Speedboat
    //Hapus Data Speedboat

    // Tambah Data Metode Pembayaran
    Route::post('/tambahMetodePembayaran', [AdminController::class, 'tambahMetodePembayaran']);
});

Route::middleware(['login'])->group(function() {
    Route::post('/pesan/{id}', [BookingController::class, 'index']);
    Route::post('/detailPesanan/{id}', [DetailPesananController::class, 'index']);
    Route::post('/saveOrders', [BookingController::class, 'createOrders']);
    Route::get('/riwayatPesanan', [RiwayatPemesanan::class, 'index']);
    Route::post('/uploadBuktiBayar', [RiwayatPemesanan::class, 'uploadBuktiBayar']);
});

Route::post('/tampil-list', [App\Http\Controllers\ListJadwalController::class, 'index']);
Route::post('/cek-login', [App\Http\Controllers\AuthentikasiController::class, 'cekLogin']);
Route::post('/tambah-user', [App\Http\Controllers\AuthentikasiController::class, 'tambahUser']);
Route::post('/logout', [App\Http\Controllers\AuthentikasiController::class, 'logout']);



