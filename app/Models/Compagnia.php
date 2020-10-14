<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnia extends Model
{
    use HasFactory;
    protected $table = 'compagnie';
    protected $fillable = [
        'nome',
        'indirizzo_web',
        'contatto',
    ];
}
