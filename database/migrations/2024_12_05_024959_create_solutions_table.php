<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('code')->unique(); // Kode solusi
            $table->text('description'); // Deskripsi solusi
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
