<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Compagnia;
use Livewire\WithPagination;

class Compagnie extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'CompagniaSelezionato' => 'compagniaSelezionato',
        'AggiornaCompagnia' => 'aggiorna_tabella',
    ];

    public function compagniaSelezionato($compagniaId){
        $this->selezionato = $compagniaId;
    }

    public function aggiorna_tabella()
    {
        $compagnie = Compagnia::orderBy('nome','asc')->paginate(20);
        return view('livewire.compagnie',compact('compagnie'));
    }

    public function render()
    {
        $compagnie = Compagnia::orderBy('nome','asc')->paginate(20);
        return view('livewire.compagnie',compact('compagnie'));
    }
}
