<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Peminjam\BukuController as PeminjamBukuController;
use App\Http\Controllers\Petugas\KategoriController;
use App\Http\Controllers\Petugas\RakController;
use App\Http\Controllers\Peminjam\KeranjangController;
use App\Http\Controllers\Petugas\TransaksiController;
use App\Http\Controllers\Petugas\PenerbitController;
use App\Http\Controllers\Petugas\BukuController;
use App\Http\Controllers\CekRoleController;
use App\Http\Controllers\Laporan\PdfController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Petugas\ChartController;
use App\Http\Controllers\Petugas\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', PeminjamBukuController::class);

Auth::routes();


//group middleware
Route::middleware(['auth'])->group(function () {

    Route::get('/cek-role', CekRoleController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //role admin dan petugas
    Route::middleware(['role:admin|petugas',])->group(function (){
        Route::get('/dashboard',DashboardController::class);

        Route::get('/kategori', KategoriController::class);
        Route::get('/rak', RakController::class);
        Route::get('/penerbit', PenerbitController::class);
        Route::get('/buku', BukuController::class);
        Route::get('/transaksi', TransaksiController::class);

    });

    //pdf buku
    Route::get('/pdf/buku/laporan', [LaporanController::class, 'generatebuku'])->name('pdf.laporan');
    //pdf kategori
    Route::get('/pdf/kategori', [LaporanController::class, 'generatekategori'])->name('pdf.kategori');
    //pdf penerbit
    Route::get('/pdf/penerbit', [LaporanController::class, 'generatepenerbit'])->name('pdf.penerbit');
    //pdf rak
    Route::get('/pdf/rak', [LaporanController::class, 'generaterak'])->name('pdf.rak');
    //pdf transaksi
    Route::get('/pdf/transaksi', [LaporanController::class, 'generatetransaksi'])->name('pdf.transaksi');

    //role peminjam saja
    Route::middleware(['role:peminjam'])->group(function () {
        Route::get('/keranjang', KeranjangController::class);
    });

    //role admin saja
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/user', UserController::class);
    });

});

