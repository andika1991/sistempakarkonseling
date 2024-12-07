<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymptomsTable extends Migration
{
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('code')->unique(); // Kode gejala
            $table->string('name'); // Nama gejala
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('symptoms');
    }
}
