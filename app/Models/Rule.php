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
    ];

    /**
     * Get the solution associated with the rule.
     */
    public function solution()
    {
        return $this->belongsTo(Solution::class, 'solution_code', 'code');
    }
}
