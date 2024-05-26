<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/pesan/{id}', [App\Http\Controllers\BookingController::class, 'index'])->middleware('login');
Route::post('/tampil-list', [App\Http\Controllers\ListJadwalController::class, 'index']);
Route::post('/cek-login', [App\Http\Controllers\AuthentikasiController::class, 'cekLogin']);
Route::post('/tambah-user', [App\Http\Controllers\AuthentikasiController::class, 'tambahUser']);
Route::post('/logout', [App\Http\Controllers\AuthentikasiController::class, 'logout']);
