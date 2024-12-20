<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('daftar_konsultasi', function (Blueprint $table) {
            $table->text('selected_symptoms')->nullable(); // Add the column here
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('daftar_konsultasi', function (Blueprint $table) {
            $table->dropColumn('selected_symptoms');
        });
    }
};
