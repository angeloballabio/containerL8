<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dogana;
use Livewire\WithPagination;

class Dogane extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'DoganaSelezionato' => 'doganaSelezionato',
        'AggiornaDogana' => 'aggiorna_tabella',
    ];

    public function doganaSelezionato($doganaId){
        $this->selezionato = $doganaId;
    }

    public function aggiorna_tabella()
    {
        $dogane = Dogana::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.dogane',compact('dogane'));
    }

    public function render()
    {
        $dogane = Dogana::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.dogane',compact('dogane'));
    }
}
