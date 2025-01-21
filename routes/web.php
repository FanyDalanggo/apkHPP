<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\BiayaOverheadController;
use App\Http\Controllers\BiayaPenyusutanController;
use App\Http\Controllers\BiayaTetapController;
use App\Http\Controllers\BiayaVariabelController;
use App\Http\Controllers\KapasitasProduksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Models\KapasitasProduksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('bahan_baku', BahanBakuController::class);
    Route::resource('biaya_variabel', BiayaVariabelController::class);
    Route::resource('biaya_penyusutan', BiayaPenyusutanController::class);
    Route::resource('biaya_tetap', BiayaTetapController::class);
    Route::resource('biaya_overhead', BiayaOverheadController::class);
    Route::resource('kapasitas_produksi', KapasitasProduksiController::class);
   
});
