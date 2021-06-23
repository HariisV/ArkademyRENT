<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/Login', [AuthController::class,'login'])->name('login');
    Route::POST('/Login', [AuthController::class,'loginProses'])->name('loginProses');
    Route::get('/Daftar', [AuthController::class,'daftar'])->name('daftar');
    Route::POST('/user', [AuthController::class,'create'])->name('userCreate');

    Route::middleware('auth')->group(function () {
        Route::GET('/shop/tambahProduk', [ProductController::class,'create'])->name('tambahProduk');
        Route::POST('/shop/tambahProduk', [ProductController::class,'store'])->name('tambahProdukProses');
        Route::GET('/shop/{id}', [ProductController::class,'show'])->name('showProduk');
        Route::GET('/hapusProduk/{id}', [ProductController::class,'destroy'])->name('hapusProduk');
        Route::GET('/editProduk/{id}', [ProductController::class,'edit'])->name('editProduk');
        Route::POST('/updateProduk/{id}', [ProductController::class,'update'])->name('updateProduk');

        
        Route::get('/user', [AuthController::class,'user'])->name('user');
        Route::POST('/Logout', [AuthController::class,'logout'])->name('logout');
        Route::POST('/deleteUser/{id}', [AuthController::class,'deleteUser'])->name('deleteUser');
        
        Route::GET('/', [ShopController::class,'index'])->name('shop');
        Route::POST('/shop/{id}', [ShopController::class,'order'])->name('orderProduk');
        Route::GET('/riwayat', [ShopController::class,'history'])->name('historyProduk');
        Route::GET('/Transaksi', [ShopController::class,'Transaksi'])->name('Transaksi');
        Route::GET('/hapusTransaksi/{id}', [ShopController::class,'hapusTransaksi'])->name('hapusTransaksi');
        Route::GET('/gantiStatus/{id}', [ShopController::class,'gantiStatus'])->name('gantiStatus');

});