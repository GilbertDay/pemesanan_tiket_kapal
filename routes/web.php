<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\RiwayatPemesanan;
use App\Http\Controllers\CetakTiketController;


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
    Route::post('/updateJadwal', [AdminController::class, 'updateJadwal']);
    //Hapus Data Jadwal
    Route::post('/deleteJadwal', [AdminController::class, 'deleteJadwal']);
    // Tambah Data Speedboat
    Route::post('/tambahSpeedboat', [AdminController::class, 'tambahSpeedboat']);
    //Edit Data Speedboat
    Route::post('/updateSpeedboat', [AdminController::class, 'updateSpeedboat']);
    //Hapus Data Speedboat
    Route::post('/deleteSpeedboat', [AdminController::class, 'deleteSpeedboat']);


    // Tambah Data Metode Pembayaran
    Route::post('/tambahMetodePembayaran', [AdminController::class, 'tambahMetodePembayaran']);
    Route::post('/accTransaksi/{id}', [AdminController::class, 'acceptTransaksi']);
    Route::post('/rejectTransaksi/{id}', [AdminController::class, 'rejectTransaksi']);


});

Route::middleware(['login'])->group(function() {
    Route::post('/pesan/{id}', [BookingController::class, 'index']);
    Route::post('/detailPesanan/{id}', [DetailPesananController::class, 'index']);
    Route::post('/saveOrders', [BookingController::class, 'createOrders']);
    Route::get('/riwayatPesanan', [RiwayatPemesanan::class, 'index']);
    Route::post('/uploadBuktiBayar', [RiwayatPemesanan::class, 'uploadBuktiBayar']);
    Route::post('/cetakTiket/{id}', [CetakTiketController::class, 'index']);
    Route::post('/updateSpeedboat', [CetakTiketController::class, 'index']);

});

Route::post('/tampil-list', [App\Http\Controllers\ListJadwalController::class, 'index']);
Route::post('/cek-login', [App\Http\Controllers\AuthentikasiController::class, 'cekLogin']);
Route::post('/tambah-user', [App\Http\Controllers\AuthentikasiController::class, 'tambahUser']);
Route::post('/logout', [App\Http\Controllers\AuthentikasiController::class, 'logout']);



