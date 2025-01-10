<?php

use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::resource('kategori', KategoriController::class);
    Route::resource('produk',ProdukController::class);
    Route::resource('bahan_baku',BahanBakuController::class);
});
