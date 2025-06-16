<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daftar_transaksi;
use App\Models\nama_transaksi;
use App\Models\MetodePembayaran;
use Illuminate\Auth\Events\Validated;
use Mockery\Generator\StringManipulation\Pass\Pass;


class Pembayaran extends Controller
{

    public function ViewBayar($code)
    {
        // $namaTransaksi = nama_transaksi::where('kode_transaksi', $code)->first();
        // $pesanan = daftar_transaksi::where('no_transaksi', $code)->get();
        $metode = MetodePembayaran::all('LinkLogo', 'Nama', 'LinkTujuan');

        return view('transaksi.HalamanPembayaran', compact('metode', 'code'));
    }

    public function pilih(request $request, $code)
    {
        $request->validate([
            'Tujuan' => 'required'
        ]);
        $metodeInput = $request->Tujuan;
        // dd($metodeInput);
        // Cari metode pembayaran yang cocok berdasarkan LinkTujuan
        $metode = MetodePembayaran::where('LinkTujuan', $metodeInput)->first();
        if (!$metode) {
            return back()->with('error', 'Metode pembayaran tidak ditemukan.');
        }

        if ($metode->Nama === 'cash') {
            return redirect(route('cash', $code));
        } else {
            return redirect()->route('konfirmasi', ['code' => $code, 'metode' => $metodeInput]);
        }
    }
    public function cash($code)
    {
        $transaksi1 = daftar_transaksi::where('no_transaksi', $code)->get();

        // Hitung total sebelum pajak
        $transaksi = daftar_transaksi::with('menu')
            ->where('no_transaksi', $code)
            ->get();

        $total = $transaksi->sum(function ($item) {
            return $item->menu->harga * $item->jumlah;
        });
        // dd($total);


        // Hitung PPN 11%
        $ppn = $total * 0.11;

        // Total setelah pajak
        $totalSetelahPpn = $total + $ppn;

        return view('transaksi.cash', compact('code', 'total', 'ppn', 'totalSetelahPpn', 'transaksi1'));
    }


    public function perhitungansementara(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'uang_masuk' => 'required|numeric',
            'hemat' => 'nullable|string',
            'total' => 'required|numeric'
        ]);

        $total = $request->total;
        $diskon = 0;

        // Diskon jika pakai kode
        if ($request->hemat === 'HEMAT10') {
            $diskon = $total * 0.10;
        }

        $totalSetelahDiskon = $total - $diskon;

        // PPN 11%
        $ppn = $totalSetelahDiskon * 0.11;
        $totalSetelahPpn = round($totalSetelahDiskon + $ppn);

        // Simpan sementara nilai untuk pengecekan uang masuk
        $sementara = $totalSetelahPpn;

        if ($request->uang_masuk < $sementara) {
            return redirect()->back()->with('error', 'uang kurang');
        }

        // Hitung uang kembali
        $hitung = $request->uang_masuk - $totalSetelahPpn;

        // Ambil data transaksi + relasi menu
        $transaksi1 = daftar_transaksi::with('menu')
            ->where('no_transaksi', $request->id)
            ->get();

        // Hitung total kuantitas
        $totalQty = $transaksi1->sum('jumlah');

        // Metode pembayaran (optional dari form)
        $metode = $request->metode ?? 'Tunai';

        $totalSebelumPpn = $totalSetelahDiskon;

        nama_transaksi::where('kode_transaksi', $request['id'])->update([
            'Bayar' => $sementara,
            'kembalian' => $hitung
        ]);


        return view('transaksi.sementara', compact(
            'hitung',
            'total',
            'diskon',
            'totalSetelahDiskon',
            'ppn',
            'totalSetelahPpn',
            'transaksi1',
            'totalQty',
            'metode',
            'totalSebelumPpn'
        ))->with('success', 'Data di simpan');
    }

    public function konfirmasi()
    {
        return view('transaksi.konfirmasi');
    }

    public function MetodeInput()
    {
        $metode = MetodePembayaran::all('Linklogo', 'nama', 'LinkTujuan');
        return view('management.Pembayaran', compact('metode'));
    }

    public function destroy($nama)
    {

        $metode = MetodePembayaran::where('Nama', $nama);

        // dd($metode);
        if (!$metode) {
            return redirect()->back()
                ->with('error', 'Data metode ' . $nama . ' tidak ditemukan.');
        }

        $metode->delete();

        return redirect()->route('Metode')->with('success', 'metode berhasil dihapus.');

    }



    public function edit(Request $request, $nama)
    {
        $validated = $request->validate([
            'linklogo' => 'required',
            'nama' => 'required|string|max:100',
            'linktujuan' => 'required',
        ]);


        $metode = MetodePembayaran::where('nama', $nama)->firstOrFail();
        // dd($metode);


        $metode->update([
            'Linklogo' => $validated['linklogo'],
            'Nama' => $validated['nama'],
            'LinkTujuan' => $validated['linktujuan'],
        ]);


        return redirect()->route('Metode')->with('success', 'Metode pembayaran berhasil diperbarui.');
    }

    public function TambahMetode(Request $request)
    {

        $validatedData = $request->validate([
            'nama_metode' => 'required',
            'Link_Tujuan' => 'required',
            'Logo_metode' => 'nullable',
        ]);
        // dd($validatedData['Logo_metode']);
        MetodePembayaran::create([
            'LinkLogo' => $validatedData['Logo_metode'] ?? null,
            'Nama' => $validatedData['nama_metode'],
            'LinkTujuan' => $validatedData['Link_Tujuan'],
        ]);

        return redirect(route('Metode'))->with('success', 'Metode pembayaran berhasil ditambahkan!');

    }

}
