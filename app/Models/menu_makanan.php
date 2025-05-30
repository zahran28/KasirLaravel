<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\daftar_transaksi;


class menu_makanan extends Model
{
       protected $table = 'menu_makanan';
       protected $primaryKey ='id_makanan';
           protected $fillable = [
        'id_makanan',
        'nama_makanan',
        'harga',
        'stok'
    ];
        public $incrementing = false;
        public $keyType = 'string';
     public function daftarTransaksi()
    {
    return $this->hasMany(daftar_transaksi::class, 'menu_id', 'id_makanan');

    }
}
