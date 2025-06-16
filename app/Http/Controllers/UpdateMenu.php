<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu_makanan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
class UpdateMenu extends Controller
{
    public function ViewTambah()
    {
        $Menu = menu_makanan::all('id_makanan', 'link', 'nama_makanan', 'harga', 'stok');
        // dd($Menu);
        return view('management.TambahStok', ['Menu' => $Menu]);
    }

    public function updateStok(Request $request)
    {

        // dd($request);
        $request->validate([
            'id_makanan' => 'required|array',
            'id_makanan.*' => 'required|exists:menu_makanan,id_makanan',
            'jumlah_tambah' => 'required|array',
            'jumlah_tambah.*' => 'required|integer|min:0',
        ]);

        $id_makanan_array = $request->input('id_makanan');
        $jumlah_tambah_array = $request->input('jumlah_tambah');

        foreach ($id_makanan_array as $index => $id_makanan) {
            $jumlah_tambah = $jumlah_tambah_array[$index];


            if ($jumlah_tambah > 0) {
                $menu = menu_makanan::find($id_makanan);

                if ($menu) {

                    $menu->stok = $menu->stok + $jumlah_tambah;
                    $menu->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Stok produk berhasil diperbarui!');

    }


    public function TambahProduk(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:menu_makanan,id_makanan',
            'gambar' => 'required|',
            'harga' => 'required|numeric|min:0',
        ]);


        menu_makanan::create([
            'nama_makanan' => $request->nama,
            'id_makanan' => $request->kode,
            'link' => $request->gambar,
            'harga' => $request->harga,
            'stok' => 0
        ]);


        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {

        $menu = menu_makanan::find($id);


        if (!$menu) {
            return redirect()->back()
                ->with('error', 'Data menu makanan dengan ID ' . $id . ' tidak ditemukan.');
        }

        $menu->delete();

        return redirect()->route('ViewTambah')->with('success', 'Menu makanan berhasil dihapus.');
    }

    public function edit(Request $request, $id)
    {
        // Temukan menu berdasarkan id_makanan (primary key string)
        $menu = menu_makanan::find($id);

        // Jika menu tidak ditemukan
        if (!$menu) {
            return redirect()->route('ViewTambah')->with('error', 'Produk tidak ditemukan untuk diperbarui.');
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'link' => 'required',
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui produk. Periksa kembali input Anda.');
        }

        try {
            // Perbarui data menu
            $menu->link = $request->link;
            $menu->nama_makanan = $request->nama_makanan;
            $menu->harga = $request->harga;

            $menu->save();

            // Redirect ke route dengan nama 'ViewTambah' setelah berhasil
            return redirect()->route('ViewTambah')->with('success', 'Produk berhasil diperbarui!');

        } catch (\Exception $e) {
            // Tangani error jika ada masalah saat menyimpan ke database
            return redirect()->route('ViewTambah')->with('error', 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());
        }
    }


}
