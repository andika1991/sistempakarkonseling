<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('behavior_code'); // Kode perilaku (contoh: P1)
            $table->text('symptoms'); // Gejala terkait, dipisahkan koma
            $table->string('solution_code'); // Kode solusi
            $table->timestamps(); // Created_at dan updated_at

     
            $table->foreign('solution_code')->references('code')->on('solutions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rules');
    }
}

