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
        Schema::create('rekap_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang');
            $table->date('date');
            $table->float('avg_amoniak');
            $table->float('avg_suhu');
            $table->float('avg_kelembaban');
            $table->float('pakan');
            $table->float('minum');
            $table->integer('jumlah_kematian');

            //Relasi
            $table->foreign('id_kandang')->references('id')->on('kandangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_datas');
    }
};