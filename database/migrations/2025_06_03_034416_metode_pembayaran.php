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
        Schema::create('MetodePembayaran', function(blueprint $table) {
            $table->id();
            $table->longText('LinkLogo');
            $table->string('Nama');
            $table->longText('LinkTujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MetodePembayaran');
    }
};
