<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ResaFattura;
use Livewire\WithPagination;

class Resa extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'ResaSelezionato' => 'resaSelezionato',
        'AggiornaResa' => 'aggiorna_tablella',
    ];

    public function resaSelezionato($resaId){
        $this->selezionato = $resaId;
    }

    public function aggiorna_tabella()
    {
        $rese = ResaFattura::orderBy('iso','asc')->paginate(26);
        return view('livewire.resa',compact('rese'));
    }

    public function render()
    {
        $rese = ResaFattura::orderBy('iso','asc')->paginate(26);
        return view('livewire.resa',compact('rese'));
    }
}
