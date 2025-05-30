<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('daftar_transaksi',function(Blueprint $table){
            $table->id();
            $table->biginteger('no_transaksi');
            $table->string('menu_id');
            $table->integer('jumlah');
            $table->string('note_makanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_transaksi');
    }
};
