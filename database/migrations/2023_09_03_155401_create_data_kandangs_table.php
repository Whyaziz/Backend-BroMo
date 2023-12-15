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
        Schema::create('data_kandangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang');
            $table->float('pakan');
            $table->float('minum');
            $table->float('bobot');
            $table->timestamp('date');

            //Relasi
            $table->foreign('id_kandang')->references('id')->on('kandangs');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kandangs');
    }
};
