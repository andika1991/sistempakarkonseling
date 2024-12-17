<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_konsultasi', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama siswa
            $table->string('class'); // Kelas siswa
            $table->text('selected_symptoms'); // Daftar kode gejala
            $table->string('solution_code', 10); // Kode solusi
            $table->float('accuracy'); // Akurasi hasil diagnosis
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key ke tabel solutions
            $table->foreign('solution_code')
                  ->references('code')
                  ->on('solutions')
                  ->onDelete('cascade'); // Hapus data jika kode solusi dihapus
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_konsultasi');
    }
}
