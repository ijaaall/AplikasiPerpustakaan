<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin']);
Route::get('/register', [AuthController::class, 'showRegister']);

Route::resource('/petugas', PetugasController::class);
Route::resource('/buku', BukuController::class);
Route::resource('/anggota', AnggotaController::class);
Route::resource('/peminjaman', PeminjamanController::class);
Route::resource('/pengembalian', PengembalianController::class);
