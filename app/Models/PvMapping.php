<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvMapping extends Model
{
    use HasFactory;

    protected $fillable = [
        'pronoun',
        'verb',
    ];
    public function pronounOption()
    {
        return $this->belongsTo(PronounOption::class, 'pronoun');
    }
}
