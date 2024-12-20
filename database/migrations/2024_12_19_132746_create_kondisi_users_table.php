<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKondisiUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisi_users', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('kondisi');  // Column to store the condition (e.g., "Tidak Tahu")
            $table->decimal('nilai', 3, 1);  // Decimal column for the "nilai" field (e.g., 0.0, 0.2)
            $table->timestamps();  // Created at and updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kondisi_users');
    }
}
