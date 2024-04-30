<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronounOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'pronoun',
    ];
}
