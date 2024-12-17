<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKonsultasi extends Model
{
    use HasFactory;

    /**
     * Nama tabel dalam database.
     *
     * @var string
     */
    protected $table = 'daftar_konsultasi';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'name',               // Nama siswa
        'class',              // Kelas siswa  // Daftar kode gejala yang dipilih
        'solution_code',      // Kode solusi
        'accuracy',           // Akurasi hasil diagnosis
    ];

    /**
     * Menyatakan bahwa kolom 'selected_symptoms' adalah JSON.
     *
     * @var array
     */
    protected $casts = [
        'selected_symptoms' => 'array',
    ];

    /**
     * Relasi ke tabel `solutions`.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solution()
    {
        return $this->belongsTo(Solution::class, 'solution_code', 'code');
    }
}
