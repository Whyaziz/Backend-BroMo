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
        Schema::table('data_kandangs', function (Blueprint $table) {
            // Tambahkan perubahan kolom di sini
            $table->integer('populasi');
            $table->integer('jumlah_kematian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_kandangs', function (Blueprint $table) {
            // Tulis logika untuk mengembalikan perubahan jika diperlukan
            $table->integer('populasi');
            $table->integer('jumlah_kematian');
        });
    }
};
