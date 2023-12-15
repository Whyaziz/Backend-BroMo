<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKandangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kandangs', function (Blueprint $table) {
            $table->date('tanggal_mulai')->nullable(); // Tambah kolom tanggal_mulai
            $table->enum('rehat', ['rehat', 'aktif'])->default('aktif'); // Tambah kolom rehat dengan tipe enum
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kandangs', function (Blueprint $table) {
            $table->dropColumn('tanggal_mulai');
            $table->dropColumn('rehat');
        });
    }
}
