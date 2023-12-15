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
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang');
            $table->date('tanggal_mulai');
            $table->date('tanggal_panen')->nullable();
            $table->integer('jumlah_panen');
            $table->integer('bobot_total');
            
            //Relasi
            $table->foreign('id_kandang')->references('id')->on('kandangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panens');
    }
};