<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoContainer extends Model
{
    use HasFactory;
    protected $table = 'tipo_container';
    protected $fillable = [
        'tipo',
    ];
}
