<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'symptoms';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'code',  // Kode gejala
        'name',  // Nama gejala
    ];

    // Jika Anda ingin memisahkan kode gejala dan nama gejala yang dikembalikan dalam bentuk string
    // Anda bisa mengatur cast atau appends jika diperlukan
}
