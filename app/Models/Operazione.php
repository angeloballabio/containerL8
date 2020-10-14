<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operazione extends Model
{
    use HasFactory;
    protected $table = 'operazioni';
    protected $fillable = [
        'nr_fattura',
        'data_fattura',
        'nome_fornitore',
        'valuta',
        'numero_pratica',
        'compagnia_aeronavale',
        'data_arrivo_nave',
        'nome_nave',
        'numero_obl',
        'container_nr',
        'cartoni',
        'lordo_obl',
        'cubatura',
        'data_carico',
        'destinatario_obl',
        'trasportatore',
        'consegna',
        'data_pratica',
        'totale_diritti',
        'totale_iva',
        'richiede_sanitari',
        'numero_sanitari',
        'richiede_ce',
        'richiede_conformita',
        'richiede_cites',
        'dogana_t1',
        'tipo_container',
        'sigillo'
    ];

    public function articolo()
    {
        return $this->hasOne('App\Modal\Articoli');
    }
}
