<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FatturaData;

class ImportaFatturaManuale extends Component
{
    public $ordine_id;
    public $articolo_id = 0, $selezionato=0;
    public $descrizione_uk, $descrizione_it, $pezzi, $colli, $peso_lordo, $peso_netto, $codice_prodotto, $unita_misura, $prezzo_unitario, $prezzo_totale ;

    protected $listeners = [
        'PSel' => 'articoloSelezionato',
    ];

    public function mount($id)
    {
        $this->ordine_id = $id;

    }

    public function articoloSelezionato($articoloId){
        $this->articolo_id = $articoloId;
        $this->selezionato = $articoloId;

        $articolo = FatturaData::where('id',$this->articolo_id)->get()->first();
        if($articolo){
            $this->descrizione_uk = $articolo->uk_descrizione;
            $this->descrizione_it = $articolo->it_descrizione;
            $this->pezzi = $articolo->pezzi;
            $this->colli = $articolo->colli;
            $this->unita_misura = $articolo->unita_misura;
            $this->peso_lordo = $articolo->peso_lordo;
            $this->peso_netto = $articolo->peso_netto;
            $this->prezzo_unitario = $articolo->prezzo_unitario;
            $this->prezzo_totale = $articolo->prezzo_totale;
            $this->codice_prodotto = $articolo->codice_prodotto;
        }
    }

    public function carica_fattura()
    {
        dd('carico la fattura');
    }

    public function ritorna()
    {
        $id = $this->ordine_id;
        return redirect(route('genera.distinta', compact('id')));
    }

    public function render()
    {
        $articoli = FatturaData::paginate(19);
        return view('livewire.importa-fattura-manuale', compact('articoli'))->layout('layouts.guest');
    }
}
