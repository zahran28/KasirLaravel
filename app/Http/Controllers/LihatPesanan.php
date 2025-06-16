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

        // Ambil id_makanan yang sudah dipesan di transaksi ini
        $pesananIdMakanan = daftar_transaksi::where('no_transaksi', $code)
            ->pluck('menu_id')
            ->toArray();
        $menuIdSudahDipesan = daftar_transaksi::where('no_transaksi', $code)
            ->pluck('menu_id')
            ->toArray();
        // List makanan yang sudah dipesan
        $listPesan = menu_makanan::whereIn('id_makanan', $menuIdSudahDipesan)->get();
        // Ambil menu makanan yang ID-nya belum dipesan
        $listMenu = menu_makanan::whereNotIn('id_makanan', $pesananIdMakanan)->get();
        $totalHarga = $pesanan->sum(function ($item) {
            return $item->jumlah * ($item->menu->harga ?? 0); // Antisipasi kalau relasi menu null
        });

        // dd($listMenu);
        return view('transaksi/order', compact('pesanan', 'namaTransaksi', 'code', 'listMenu', 'listPesan', 'totalHarga'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:daftar_transaksi,id',
            'jumlah' => 'required|integer',
            'note_makanan' => 'nullable|string',
        ]);
        $jumlah1 = $request['jumlah'];

        if ($jumlah1 < 1) {
            return redirect()->back()->with('error', 'jumlah inputan tidak valid');
        }

        $transaksi = daftar_transaksi::findOrFail($request->id);
        $menu = menu_makanan::where('id_makanan', $transaksi->menu_id)->first();

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan.');
        }

        $jumlah_baru = $request->jumlah;
        $jumlah_lama = $transaksi->jumlah;
        $selisih = $jumlah_baru - $jumlah_lama;

        // Kalau jumlah bertambah, cek stok
        if ($selisih > 0) {
            if ($menu->stok < $selisih) {
                return redirect()->back()->with('error', 'Stok tidak cukup. Stok tersedia: ' . $menu->stok);
            }

            // Kurangi stok jika cukup
            $menu->stok -= $selisih;
            $menu->save();
        }
        // Kalau jumlah berkurang, kembalikan stok
        elseif ($selisih < 0) {
            $menu->stok += abs($selisih);
            $menu->save();
        }

        // Update data transaksi
        $transaksi->jumlah = $jumlah_baru;
        $transaksi->note_makanan = $request->note_makanan ?? 'tidak ada pesan';
        $transaksi->save();



        return redirect(route('lihat-pesanan', $transaksi->no_transaksi))
            ->with('success', 'Transaksi berhasil diperbarui.');
    }




    public function delete(Request $request)
    {
        // Validasi bahwa ID ada dan valid
        $request->validate([
            'id' => 'required|exists:daftar_transaksi,id',
        ]);

        // Cari data berdasarkan ID
        $transaksi = daftar_transaksi::findOrFail($request->id);

        // Ambil data menu terkait
        $menu = $transaksi->menu; // pastikan ada relasi menu di model daftar_transaksi

        if ($menu) {
            // Tambah stok menu sesuai jumlah pesanan yang dihapus
            $menu->stok += $transaksi->jumlah;
            $menu->save();
        }

        // Hapus data pesanan
        $transaksi->delete();

        // Redirect balik dengan pesan sukses
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus dan stok menu diperbarui.');
    }

    public function TambahMenu(request $request)
    {


        $request->validate([
            'kode_transaksi' => ['required'],
            'id_makanan' => ['required', 'array'],
            'jumlah' => ['required', 'array'],
            'catatan' => ['nullable', 'array'],
        ]);
        // dd($tes);
        $id_transaksi = $request->kode_transaksi;
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



        $notransaksi2 = $request['kode_transaksi'];

        return redirect(route('lihat-pesanan', $notransaksi2))->with('success', 'buat pesanan berhasil');
    }
}
