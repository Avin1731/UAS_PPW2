<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PegawaiController;

Route::get('/', [MainController::class, 'index'])->name('index');

// Route Pekerjaan
Route::prefix('/pekerjaan')->group(function () {
    Route::get('/', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
    Route::get('/add', [PekerjaanController::class, 'add'])->name('pekerjaan.add');
    Route::post('insert', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
    Route::get('edit/{id}', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
    Route::put('update', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
    Route::delete('delete', [PekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');
});

// Route Pegawai
Route::prefix('/pegawai')->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/add', [PegawaiController::class, 'add'])->name('pegawai.add');
    Route::post('insert', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('update', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('delete', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});