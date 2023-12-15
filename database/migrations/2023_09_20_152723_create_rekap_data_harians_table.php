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
        Schema::create('rekap_data_harians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang');
            $table->date('date');
            $table->integer('amoniak');
            $table->integer('suhu');
            $table->integer('kelembaban');

            //Relasi
            $table->foreign('id_kandang')->references('id')->on('kandangs');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_data_harians');
    }
};