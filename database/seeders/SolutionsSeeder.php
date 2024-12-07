<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolutionsSeeder extends Seeder
{
    public function run()
    {
        $solutions = [
            ['code' => 'S1', 'description' => 'Bayangkan akibat di masa depan, belajar menolak ajakan buruk'],
            ['code' => 'S2', 'description' => 'Aktivitas menyenangkan, tanya guru, kurangi penggunaan gadget'],
            ['code' => 'S3', 'description' => 'Belajar bersama teman, komunikasikan gaya belajar ke guru'],
            ['code' => 'S4', 'description' => 'Belajar mengontrol emosi, diskusi dengan guru/orang tua'],
            ['code' => 'S5', 'description' => 'Perbanyak komunikasi dengan guru, belajar bersama, membaca buku'],
            ['code' => 'S6', 'description' => 'Buat jadwal harian, sampaikan masalah ke guru/orang tua'],
            ['code' => 'S7', 'description' => 'Komunikasi dengan keluarga/guru, belajar mengontrol emosi'],
        ];

        DB::table('solutions')->insert($solutions);
    }
}
