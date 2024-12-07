<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RulesSeeder extends Seeder
{
    public function run()
    {
        $rules = [
            ['behavior_code' => 'P1', 'symptoms' => 'G001,G002,G003,G018', 'solution_code' => 'S1'],
            ['behavior_code' => 'P2', 'symptoms' => 'G004,G005,G006,G007', 'solution_code' => 'S2'],
            ['behavior_code' => 'P3', 'symptoms' => 'G007,G008,G009,G015', 'solution_code' => 'S3'],
            ['behavior_code' => 'P4', 'symptoms' => 'G010,G011,G012,G013', 'solution_code' => 'S4'],
            ['behavior_code' => 'P5', 'symptoms' => 'G008,G014,G015,G016', 'solution_code' => 'S5'],
            ['behavior_code' => 'P6', 'symptoms' => 'G003,G017,G018,G019', 'solution_code' => 'S6'],
            ['behavior_code' => 'P7', 'symptoms' => 'G020,G021,G022,G023', 'solution_code' => 'S7'],
        ];

        DB::table('rules')->insert($rules);
    }
}
