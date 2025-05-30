<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\daftar_transaksi;
use App\Models\pemasukan_pengeluaran;

class nama_transaksi extends Model
{
    protected $table = 'nama_transaksi';

    protected $fillable = [
        'kode_transaksi',
        'nama_pesanan',
    ];

        // Relasi ke daftar_transaksi
    public function daftarTransaksi()
    {
        return $this->hasMany(daftar_transaksi::class, 'no_transaksi', 'kode_transaksi');
    }
        // Relasi ke pemasukan
    public function pemasukan()
    {
        return $this->hasOne(pemasukan_pengeluaran::class, 'kode_transaksi', 'kode_transaksi');
    }
}
