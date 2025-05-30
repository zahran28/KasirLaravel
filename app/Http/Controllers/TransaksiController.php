<?php

namespace App\Http\Controllers;

use App\Models\daftar_transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function tambahSemuaMenu(Request $request)
{
    $idTransaksi = $request->input('id_transaksi');
    $orders = $request->input('orders', []);

    foreach ($orders as $json) {
        $order = json_decode($json, true); // parse JSON string

        daftar_transaksi::create([
            'id_transaksi' => $idTransaksi,
            'id_makanan' => $order['id_makanan'],
            'jumlah' => $order['jumlah'],
            'catatan' => null, // tambahkan kalau nanti mau pakai catatan
        ]);
    }

    return redirect()->back()->with('success', 'Semua pesanan berhasil disimpan.');
}

}
