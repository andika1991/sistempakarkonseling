<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSelectedSymptomsFromDaftarKonsultasiTable extends Migration
{
    /**
     * Run the migrations: Menghapus kolom 'selected_symptoms'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daftar_konsultasi', function (Blueprint $table) {
            $table->dropColumn('selected_symptoms');
        });
    }

    /**
     * Reverse the migrations: Menambahkan kembali kolom 'selected_symptoms'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daftar_konsultasi', function (Blueprint $table) {
            $table->text('selected_symptoms')->nullable();
        });
    }
}
