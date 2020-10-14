<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consegna;
use Livewire\WithPagination;

class ElencoConsegne extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'ConsegnaSelezionato' => 'consegnaSelezionato',
        'AggiornaConsegna' => 'aggiorna_tablella',
    ];

    public function consegnaSelezionato($consegnaId){
        $this->selezionato = $consegnaId;
    }

    public function aggiorna_tabella()
    {
        $consegne = Consegna::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-consegne',compact('consegne'));
    }

    public function render()
    {
        $consegne = Consegna::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-consegne',compact('consegne'));
    }
}
