<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consegna;
use Livewire\WithPagination;

class Consegne extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'ConsegnaSelezionato' => 'consegnaSelezionato',
        'AggiornaConsegna' => 'aggiorna_tabella',
    ];

    public function consegnaSelezionato($consegnaId){
        $this->selezionato = $consegnaId;
    }

    public function aggiorna_tabella()
    {
        $consegne = Consegna::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.consegne',compact('consegne'));
    }

    public function render()
    {
        $consegne = Consegna::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.consegne',compact('consegne'));
    }
}
