<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymptomsSeeder extends Seeder
{
    public function run()
    {
        $symptoms = [
            ['code' => 'G001', 'name' => 'Memiliki pergaulan bebas tanpa pengawasan orang tua'],
            ['code' => 'G002', 'name' => 'Sering mengikuti apa yang dilakukan teman'],
            ['code' => 'G003', 'name' => 'Terlambat karena tugas dari orang tua'],
            ['code' => 'G004', 'name' => 'Kesulitan memahami pelajaran tertentu'],
            ['code' => 'G005', 'name' => 'Tidak memiliki motivasi belajar'],
            ['code' => 'G006', 'name' => 'Sarana belajar terbatas'],
            ['code' => 'G007', 'name' => 'Tidak menyukai guru mata pelajaran tertentu'],
            ['code' => 'G008', 'name' => 'Tidak menguasai mata pelajaran tertentu'],
            ['code' => 'G009', 'name' => 'Penurunan prestasi belajar'],
            ['code' => 'G010', 'name' => 'Saling ejek dengan teman'],
            ['code' => 'G011', 'name' => 'Pertengkaran pribadi/kelompok'],
            ['code' => 'G012', 'name' => 'Masalah dengan teman perempuan/pacar'],
            ['code' => 'G013', 'name' => 'Merasa direndahkan oleh teman'],
            ['code' => 'G014', 'name' => 'Merasa kurang mampu menjawab soal'],
            ['code' => 'G015', 'name' => 'Masalah kepercayaan diri dan mental'],
            ['code' => 'G016', 'name' => 'Potensi terbatas'],
            ['code' => 'G017', 'name' => 'Kesulitan mendapatkan transportasi'],
            ['code' => 'G018', 'name' => 'Sering bangun kesiangan'],
            ['code' => 'G019', 'name' => 'Masalah tanggung jawab'],
            ['code' => 'G020', 'name' => 'Tidak nyaman karena masalah keluarga'],
            ['code' => 'G021', 'name' => 'Masalah dengan diri, teman, keluarga'],
            ['code' => 'G022', 'name' => 'Mudah marah dan terpengaruh'],
            ['code' => 'G023', 'name' => 'Sifat iri terhadap teman/keluarga'],
        ];

        DB::table('symptoms')->insert($symptoms);
    }
}
