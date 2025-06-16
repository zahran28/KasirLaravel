<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\daftar_transaksi;


class menu_makanan extends Model
{
       protected $table = 'menu_makanan';
       protected $primaryKey ='id_makanan';
protected $fillable = [
    'nama_makanan',
    'id_makanan',
    'link',
    'harga',
    'stok',
];


public $incrementing = false;
protected $keyType = 'string';

     public function daftarTransaksi()
    {
    return $this->hasMany(daftar_transaksi::class, 'menu_id', 'id_makanan');

    }
}
