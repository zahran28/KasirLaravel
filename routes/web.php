<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\buat_pesanan;
use App\Http\Controllers\LihatPesanan;
use App\Http\Controllers\Pembayaran;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UpdateMenu;
use App\Http\Controllers\home; // Pastikan ini home, bukan Home
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Laporan;



// Halaman Login
Route::get('/Login', [LoginController::class, 'index'])->name('login');
Route::post('/Login/Proses', [LoginController::class, 'login'])->name('Submit'); // Nama route asli Anda

// Contoh halaman yang bersifat publik
Route::get('/a', function () {
    return view('home/arsip');
});

Route::get('/', function () {
    return view('LandingPage/index');
});

Route::get('/menu', function () {
    return view('transaksi/menu');
});


Route::middleware(['auth'])->group(function () {

    // Route Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dasboard', [home::class, 'index'])->name('dashboard'); // Mempertahankan nama 'dasboard' sesuai permintaan

    // Grup Route: Profil Pengguna

    Route::prefix('profile')->name('')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::put('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    });

    // Grup Route: Pesanan (Order Management)

    Route::prefix('pesanan')->name('')->group(function () {
        Route::post('/proses', [buat_pesanan::class, 'create_no_pesanan'])->name('buat_pesanan');
        Route::get('/pilih_menu/{code}', [buat_pesanan::class, 'view_menu'])->name('pilih_menu');
        Route::post('/tambah', [buat_pesanan::class, 'create_pesanan'])->name('tambah_menu');
        Route::get('/lihat/{codes}', [LihatPesanan::class, 'view'])->name('lihat-pesanan');
        Route::put('/edit', [LihatPesanan::class, 'update'])->name('edit');
        Route::delete('/hapus', [LihatPesanan::class, 'delete'])->name('hapus');
        Route::post('/tambah-menu', [LihatPesanan::class, 'TambahMenu'])->name('tambah-item');
        Route::post('/tambah-semua-menu', [TransaksiController::class, 'tambahSemuaMenu'])->name('tambah_semua_menu');
    });

    // Grup Route: Pembayaran (Payment Process)

    Route::prefix('pembayaran')->name('')->group(function () {
        Route::get('/MetodePembayaran', [Pembayaran::class, 'MetodeInput'])->name('Metode');
        Route::get('/{code}', [Pembayaran::class, 'ViewBayar'])->name('view');
        Route::post('/pilih/{code}', [Pembayaran::class, 'pilih'])->name('pilih');
        Route::get('/proses/{code}', [Pembayaran::class, 'cash'])->name('cash');
        Route::post('/perhitungan', [Pembayaran::class, 'perhitungansementara'])->name('sementara');
        Route::get('/konfirmasi/{code}', [Pembayaran::class, 'konfirmasi'])->name('konfirmasi');
        Route::delete('/delete/{nama}', [Pembayaran::class, 'destroy'])->name('destroy');
        Route::put('/edit/{nama}', [Pembayaran::class, 'edit'])->name('edit-metode');
        Route::post('/Tambah', [Pembayaran::class, 'TambahMetode'])->name('TambahMetode');
    });

    // Grup Route: Manajemen Produk/Menu (Update, Tambah, Hapus, Edit)

    Route::prefix('produk')->name('')->group(function () {
        Route::get('/UpdateProduk', [UpdateMenu::class, 'ViewTambah'])->name('ViewTambah');
        Route::put('/UpdateProduk', [UpdateMenu::class, 'updateStok'])->name('updateStok');
        Route::get('/TambahProduk', [UpdateMenu::class, 'TambahProduk'])->name('Tambahproduk');
        Route::delete('/{id}/delete', [UpdateMenu::class, 'Destroy'])->name('Deleteproduk');
        Route::put('/{id}/edit', [UpdateMenu::class, 'edit'])->name('Editproduk');
    });

    route::prefix(('Laporan'))->name('')->group(function () {
        route::get('/Laporan', [Laporan::class, 'index'])->name('LihatLaporan');

    });

});
