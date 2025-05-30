<?php

use App\Events\UserLog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\buat_pesanan;
use App\Models\User;
use App\Http\Controllers\LihatPesanan;
use App\Http\Controllers\TambahMenu;
use App\Http\Controllers\TransaksiController;


Route::get('/a', function () {
    return view('home/arsip');
});

Route::get('/home', function () {
    return view('home/index');
});
Route::get('/menu', function () {
    return view('transaksi/menu');
});

Route::get("/test", function () {
    $user = User::first();
    event(new UserLog($user));
    return "hallo";
});

Route::POST('/proses', [buat_pesanan::class, 'create_no_pesanan'])->name('buat_pesanan');
Route::get('/pilih_menu/{code}', [buat_pesanan::class, 'view_menu'])->name('pilih_menu');
Route::post('/tambah', [buat_pesanan::class, 'create_pesanan'])->name('tambah_menu');
Route::get('/LihatPesanan/{codes}',[LihatPesanan::class,'view'])->name('lihat-pesanan');
Route::post('/proses/menu',[TambahMenu::class,'view'])->name('LihatStok');
Route::post('/pesan/banyak', [TransaksiController::class, 'tambahSemuaMenu'])->name('tambah_semua_menu');

