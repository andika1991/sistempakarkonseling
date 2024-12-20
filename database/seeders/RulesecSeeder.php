<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Rulesec extends Seeder
{
    public function run()
    {
        // Data gejala untuk diinsert
        $data = [
            // Data untuk solusi S1
            ['symptoms' => 'G001', 'solution_code' => 'S1', 'mb' => 1.0, 'md' => 0.0],
            ['symptoms' => 'G002', 'solution_code' => 'S1', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G003', 'solution_code' => 'S1', 'mb' => 0.6, 'md' => 0.4],
            ['symptoms' => 'G018', 'solution_code' => 'S1', 'mb' => 0.9, 'md' => 0.1],

            // Data untuk solusi S2
            ['symptoms' => 'G004', 'solution_code' => 'S2', 'mb' => 0.7, 'md' => 0.3],
            ['symptoms' => 'G005', 'solution_code' => 'S2', 'mb' => 0.9, 'md' => 0.1],
            ['symptoms' => 'G006', 'solution_code' => 'S2', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G007', 'solution_code' => 'S2', 'mb' => 0.6, 'md' => 0.4],

            // Data untuk solusi S3
            ['symptoms' => 'G007', 'solution_code' => 'S3', 'mb' => 1.0, 'md' => 0.0],
            ['symptoms' => 'G008', 'solution_code' => 'S3', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G009', 'solution_code' => 'S3', 'mb' => 0.6, 'md' => 0.4],
            ['symptoms' => 'G015', 'solution_code' => 'S3', 'mb' => 0.9, 'md' => 0.1],

            // Data untuk solusi S4
            ['symptoms' => 'G010', 'solution_code' => 'S4', 'mb' => 1.0, 'md' => 0.0],
            ['symptoms' => 'G011', 'solution_code' => 'S4', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G012', 'solution_code' => 'S4', 'mb' => 0.7, 'md' => 0.3],
            ['symptoms' => 'G013', 'solution_code' => 'S4', 'mb' => 0.6, 'md' => 0.4],

            // Data untuk solusi S5
            ['symptoms' => 'G008', 'solution_code' => 'S5', 'mb' => 1.0, 'md' => 0.0],
            ['symptoms' => 'G014', 'solution_code' => 'S5', 'mb' => 0.9, 'md' => 0.1],
            ['symptoms' => 'G015', 'solution_code' => 'S5', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G016', 'solution_code' => 'S5', 'mb' => 0.7, 'md' => 0.3],

            // Data untuk solusi S6
            ['symptoms' => 'G003', 'solution_code' => 'S6', 'mb' => 1.0, 'md' => 0.0],
            ['symptoms' => 'G017', 'solution_code' => 'S6', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G018', 'solution_code' => 'S6', 'mb' => 0.6, 'md' => 0.4],
            ['symptoms' => 'G019', 'solution_code' => 'S6', 'mb' => 0.7, 'md' => 0.3],

            // Data untuk solusi S7
            ['symptoms' => 'G020', 'solution_code' => 'S7', 'mb' => 1.0, 'md' => 0.0],
            ['symptoms' => 'G021', 'solution_code' => 'S7', 'mb' => 0.8, 'md' => 0.2],
            ['symptoms' => 'G022', 'solution_code' => 'S7', 'mb' => 0.7, 'md' => 0.3],
            ['symptoms' => 'G023', 'solution_code' => 'S7', 'mb' => 0.9, 'md' => 0.1],
        ];

        // Insert data ke dalam tabel
        foreach ($data as $item) {
            DB::table('rules')->insert($item);
        }
    }
}
