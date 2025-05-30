<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nama_transaksi;
use App\Models\menu_makanan;
use App\Models\daftar_transaksi;
class LihatPesanan extends Controller
{
    public function view($code)
    {
        $pesanan = daftar_transaksi::where('no_transaksi', $code)->get();
        $namaTransaksi = nama_transaksi::where('kode_transaksi', $code)->first();

        return view('transaksi.order', compact('pesanan', 'code', 'namaTransaksi'));
    }
}
