<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DaftarTransaksi;
use App\Models\Pemasukan;
class pemasukan_pengeluaran extends Model
{
        protected $table = 'pemasukan';

    protected $fillable = [
        'kode_transaksi',
        'total_belanja',
        'uang_masuk',
        'uang_keluar'
    ];
        // Relasi ke nama_transaksi
    public function namaTransaksi()
    {
        return $this->belongsTo(nama_transaksi::class, 'kode_transaksi', 'kode_transaksi');
    }
}
