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
        Schema::create('suhu_kelembaban_sensors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang');
            $table->integer('suhu');
            $table->integer('kelembaban');
            $table->timestamp('time');

            //Relasi
            $table->foreign('id_kandang')->references('id')->on('kandangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suhu_kelembaban_sensors');
    }
};