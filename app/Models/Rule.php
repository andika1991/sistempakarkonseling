<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'behavior_code',
        'symptoms',
        'solution_code',
        'mb',
        'md',
    ];

    /**
     * Get the solution associated with the rule.
     */
    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'rule_symptom', 'rule_id', 'symptom_id');
    }

    // Relasi dengan solutions (sesuai struktur yang Anda miliki)
    public function solution()
    {
        return $this->belongsTo(Solution::class, 'solution_id');
    }

}
