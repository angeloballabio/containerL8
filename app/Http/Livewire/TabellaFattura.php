<?php

namespace App\Http\Livewire;
use App\Models\FatturaData;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Livewire\Component;
use App\Http\Livewire\ImportaFatturaManuale;

class TabellaFattura extends Component
{
    use WithPagination;

    /* public $ordine_id;
    public $articolo_id = 0, $selezionato=0;
    public $descrizione_uk, $descrizione_it, $pezzi, $colli, $peso_lordo, $peso_netto, $codice_prodotto, $unita_misura, $prezzo_unitario, $prezzo_totale, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites; */
    #public static  $articolo_id = 0;
    public $selezionato = 0;
    public $ordine_id = 0;

    protected $listeners = [
        'PSel' => 'articoloSelezionato',
    ];


    public function articoloSelezionato($articoloId){

        self::$articolo_id = $articoloId;
        $this->selezionato = $articoloId;

        #self.setta_articolo($articoloId);
        #$articoli = FatturaData::where('operazione', ImportaFatturaManuale::$ordine_id)->paginate(19);
        #$articoli = FatturaData::where('operazione','=', $this->selezionato)->paginate(19);
        $articoli = FatturaData::where('operazione','=', $this->ordine_id)->paginate(19);
        #dd('sono in articolo selezionato : ', $articoli);
        return view('livewire.tabella-fattura', compact('articoli'))->layout('layouts.guest');
    }

    /* public function setta_articolo($id)
    {
        self::$articolo_id = $id;
    } */

    public function render()
    {

        #dd(ImportaFatturaManuale::$ordine_id);
        $this->ordine_id = ImportaFatturaManuale::$ordine_id;
        $articoli = FatturaData::where('operazione','=', $this->ordine_id)->paginate(19);
        #dd('sono in articolo selezionato : ', ImportaFatturaManuale::$ordine_id);
        return view('livewire.tabella-fattura', compact('articoli'))->layout('layouts.guest');
    }
}
