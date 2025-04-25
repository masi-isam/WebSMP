<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('dashboard');

// Dashboard
Route::get('/', [DashboardController::class, 'jumlah'])->name('dashboard');


// Siswa
Route::get('/siswa', [MuridController::class, 'tampil'])->name('siswa.tampil');
Route::post('/murid/tambah', [MuridController::class, 'tambah'])->name('siswa.tambah');
Route::post('/murid/edit/{id}', [MuridController::class, 'edit'])->name('siswa.edit');
Route::post('/murid/hapus/{id}', [MuridController::class, 'hapus'])->name('siswa.hapus');

// Guru
Route::get('/guru', [GuruController::class, 'tampil'])->name('guru.tampil');
Route::post('/guru/tambah', [GuruController::class, 'tambah'])->name('guru.tambah');
Route::post('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit');
Route::post('/guru/hapus/{id}', [GuruController::class, 'hapus'])->name('guru.hapus');

//Staff
Route::get('/staff', [StaffController::class, 'tampil'])->name('staff.tampil');
Route::post('/staff/tambah/', [StaffController::class, 'tambah'])->name('staff.tambah');
Route::post('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
Route::post('/staff/hapus/{id}', [StaffController::class, 'hapus'])->name('staff.hapus');