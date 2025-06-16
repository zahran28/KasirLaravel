<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MetodePembayaran extends Model
{
    protected $table = 'MetodePembayaran';
    protected $fillable = [
        'LinkLogo',
        'Nama',
        'LinkTujuan'
    ];
}
