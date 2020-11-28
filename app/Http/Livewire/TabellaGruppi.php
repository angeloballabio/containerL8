<?php

namespace App\Http\Livewire;
use App\Models\FatturaData;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Livewire\Component;

class TabellaGruppi extends Component
{
    use WithPagination;

    public $ordine_id;
    public $articolo_id = 0, $selezionato=0;
    public $descrizione_uk, $descrizione_it, $pezzi, $colli, $peso_lordo, $peso_netto, $codice_prodotto, $unita_misura, $prezzo_unitario, $prezzo_totale, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites;

    public function render()
    {

        #$gruppi = FatturaData::select('id', 'it_descrizione', 'voce_doganale')->groupBy('id', 'it_descrizione', 'voce_doganale')->paginate(19);
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->groupBy('it_descrizione')->paginate(19);
        return view('livewire.tabella-gruppi', compact('gruppi'))->layout('layouts.guest');

    }
}
