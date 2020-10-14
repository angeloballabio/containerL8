<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dogana;
use Livewire\WithPagination;

class ElencoDogane extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'DoganaSelezionato' => 'doganaSelezionato',
        'AggiornaDogane' => 'aggiorna_tablella',
    ];

    public function doganaSelezionato($doganaId){
        $this->selezionato = $doganaId;
    }

    public function aggiorna_tabella()
    {
        $dogane = Dogana::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-dogane',compact('dogane'));
    }

    public function render()
    {
        $dogane = Dogana::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-dogane',compact('dogane'));
    }
}
