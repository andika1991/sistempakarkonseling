<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'symptoms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Get the rules associated with the symptom.
     *
     * (Optional: If symptoms are linked to rules in the system)
     */
    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'rule_symptom', 'symptom_id', 'rule_id');
    }
}
