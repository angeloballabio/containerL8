<?php

namespace App\Http\Livewire;
use App\Models\FatturaData;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Livewire\Component;

class TabellaFattura extends Component
{
    use WithPagination;

    public $ordine_id;
    public $articolo_id = 0, $selezionato=0;
    public $descrizione_uk, $descrizione_it, $pezzi, $colli, $peso_lordo, $peso_netto, $codice_prodotto, $unita_misura, $prezzo_unitario, $prezzo_totale, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites;

    protected $listeners = [
        'PSel' => 'articoloSelezionato',
    ];

    public function articoloSelezionato($articoloId){
        $this->articolo_id = $articoloId;
        $this->selezionato = $articoloId;
    }

    public function render()
    {
        $articoli = FatturaData::paginate(19);
        return view('livewire.tabella-fattura', compact('articoli'))->layout('layouts.guest');

    }
}
