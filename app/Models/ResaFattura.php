<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResaFattura extends Model
{
    use HasFactory;
    protected $table = 'resa_fattura';
    protected $fillable = [
        'iso',
        'descrizione',
    ];
}
