<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FatturaData extends Model
{
    use HasFactory;
    protected $table = 'fattura_data';
    protected $fillable = [
        'uk_descrizione',
        'it_descrizione',
        'codice_prodotto',
        'peso_lordo',
        'peso_netto',
        'pezzi',
        'colli',
        'prezzo_unitario',
        'prezzo_totale',
        'unita_misura'
    ];
}
