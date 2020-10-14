<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElencoArticoli extends Model
{
    use HasFactory;
    protected $table = 'elenco_articoli';
    protected $fillable = [
        'descrizione_uk',
        'descrizione_it',
        'voce_doganale',
        'diritti_doganali',
        'val_iva',
        'aliquota_iva',
        'acciaio',
        'acciaio_inox',
        'plastica',
        'legno',
        'bambu',
        'vetro',
        'ceramica',
        'carta',
        'pietra',
        'posateria',
        'attrezzi_cucina',
        'richiede_ce',
        'richiede_age',
        'richiede_cites',
        'fornitore_id'
    ];
}
