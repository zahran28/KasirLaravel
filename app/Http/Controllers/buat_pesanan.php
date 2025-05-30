<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\ViewCacheCommand;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\nama_transaksi;
use App\Models\menu_makanan;
use App\Models\daftar_transaksi;

class buat_pesanan extends Controller
{
    public function create_no_pesanan(request $request)
    {
        // dd($request);
        $notransaksi = Carbon::now()->format('YmdHis');

        $validate = $request->validate([
            'name' => ['required']
        ]);
        nama_transaksi::create([
            'nama_pesanan' => $validate['name'],
            'kode_transaksi' => $notransaksi
        ]);

        return redirect(route("pilih_menu", $notransaksi))->with('success', 'buat pesanan berhasil');
    }

    public function view_menu($code)
    {
        // dd($code);
        $menus = menu_makanan::all();
        return view('transaksi/menu', compact("code", "menus"));
    }

    public function create_pesanan(request $request)
    {

        $request->validate([
            'id_transaksi' => ['required'],
            'id_makanan' => ['required', 'array'],
            'jumlah' => ['required', 'array'],
            'catatan' => ['nullable', 'array'],
        ]);

        $id_transaksi = $request->id_transaksi;
        $id_makanans = $request->id_makanan;
        $jumlahs = $request->jumlah;
        $catatans = $request->catatan;

        foreach ($id_makanans as $i => $id_makanan) {
            $jumlah = $jumlahs[$i];
            $catatan = $catatans[$i] ?? 'Tidak ada catatan';
            // dd($id_makanans);

            if ($jumlah > 0) {
                $menu = menu_makanan::where('id_makanan', $id_makanan)->first();

                // dd($menu);
                if ($menu) {
                    if ($menu->stok >= $jumlah) {
                        $menu->stok -= $jumlah;
                        $menu->save();

                        daftar_transaksi::create([
                            'no_transaksi' => $id_transaksi,
                            'menu_id' => $id_makanan,
                            'jumlah' => $jumlah,
                            'note_makanan' => $catatan,
                        ]);
                    } else {
                        // Misalnya catat ke log, atau simpan info item yang gagal
                        session()->flash('warning_' . $menu->id_makanan, 'Stok tidak cukup untuk ' . $menu->nama_makanan);
                    }
                }
            }
        }



        $notransaksi2 = $request->input('id_transaksi');

        return redirect(route('pilih_menu', $notransaksi2))->with('success', 'buat pesanan berhasil');

    }
}
