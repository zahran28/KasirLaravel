<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            schema::create('nama_transaksi',function(Blueprint $table ){
                $table->id()->primary();
                $table->biginteger('kode_transaksi');
                $table->string('nama_pesanan');
                $table->biginteger('Bayar');
                $table->biginteger('kembalian');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_transaksi');
    }
};
