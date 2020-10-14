<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Valuta;
use Livewire\WithPagination;

class Valute extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'ValutaSelezionato' => 'valutaSelezionato',
        'AggiornaValuta' => 'aggiorna_tabella',
    ];

    public function valutaSelezionato($valutaId){
        $this->selezionato = $valutaId;
    }

    public function aggiorna_tabella()
    {
        $valute = Valuta::orderBy('iso','asc')->paginate(26);
        return view('livewire.valute',compact('valute'));
    }

    public function render()
    {
        $valute = Valuta::orderBy('iso','asc')->paginate(26);
        return view('livewire.valute',compact('valute'));
    }
}
