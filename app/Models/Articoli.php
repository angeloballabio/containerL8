<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articoli extends Model
{
    use HasFactory;
    protected $table = 'articoli';
    protected $fillable = [
        'descrizione_uk',
        'descrizione_it',
        'tot_pezzi',
        'tot_colli',
        'tot_lordo',
        'tot_netto',
        'tot_valore',
        'ordine_id',
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

    /* public function operazione()
    {
        return $this->belongsTo('App\Models\Operazione');
    } */
}
