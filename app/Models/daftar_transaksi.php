<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\menu_makanan;
use App\Models\nama_transaksi;

class daftar_transaksi extends Model
{
      protected $table = 'daftar_transaksi';


    protected $fillable = [
        'no_transaksi',
        'menu_id',
        'jumlah',
        'note_makanan'
    ];
        public function namaTransaksi()
    {
        return $this->belongsTo(nama_transaksi::class, 'no_transaksi', 'kode_transaksi');
    }
    public function menu()
    {
        return $this->belongsTo(menu_makanan::class, 'menu_id', 'id_makanan');
    }
}
