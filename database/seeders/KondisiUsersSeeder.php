<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kondisi_users')->insert([
            ['kondisi' => 'Tidak Sama Sekali', 'nilai' => 0.0],
            ['kondisi' => 'Ragu', 'nilai' => 0.2],
            ['kondisi' => 'Netral', 'nilai' => 0.4],
            ['kondisi' => 'Yakin', 'nilai' => 0.6],
            ['kondisi' => 'Sangat Yakin', 'nilai' => 0.8],
            ['kondisi' => 'Mutlak Pasti', 'nilai' => 1.0],
        ]);
    }
}
