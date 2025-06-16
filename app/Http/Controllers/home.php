<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nama_transaksi;
use App\Models\menu_makanan;
use App\Models\daftar_transaksi;
use Illuminate\Support\Carbon;

class home extends Controller
{
public function index(){
    $today = Carbon::today();


    $transaksiHariIni = daftar_transaksi::with('menu')
        ->whereDate('created_at', $today)
        ->get();

    $pendapatanHariIni = $transaksiHariIni->sum(function ($transaksi) {
        return $transaksi->jumlah * ($transaksi->menu->harga ?? 0);
    });

    $customerHariIni = $transaksiHariIni->pluck('no_transaksi')->unique()->count();

    $totalCustomer = daftar_transaksi::pluck('no_transaksi')->unique()->count();

    return view('home.index', compact('pendapatanHariIni', 'customerHariIni', 'totalCustomer'));
  }
}
