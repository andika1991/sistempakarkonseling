<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableAddMbMdAndRemoveBehaviorCode extends Migration
{
    public function up()
    {
        Schema::table('rules', function (Blueprint $table) {
            // Tambahkan kolom mb dan md
            $table->float('mb')->nullable();
            $table->float('md')->nullable();

            // Hapus kolom behavior_code
            $table->dropColumn('behavior_code');
        });
    }

    public function down()
    {
        Schema::table('rules', function (Blueprint $table) {
            // Rollback perubahan
            $table->dropColumn(['mb', 'md']);
            $table->string('behavior_code', 10)->nullable();
        });
    }
}
