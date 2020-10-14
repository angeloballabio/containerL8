<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fornitore;
use Livewire\WithPagination;

class ElencoFornitori extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'FornitoreSelezionato' => 'fornitoreSelezionato',
        'AggiornaFornitore' => 'aggiorna_tablella',
    ];

    public function fornitoreSelezionato($fornitoreId){
        $this->selezionato = $fornitoreId;
    }

    public function aggiorna_tabella()
    {
        $fornitori = Fornitore::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-fornitori',compact('fornitori'));
    }

    public function render()
    {
        $fornitori = Fornitore::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-fornitori',compact('fornitori'));
    }
}
