<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trasportatore;
use Livewire\WithPagination;

class Trasportatori extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'TrasportatoreSelezionato' => 'trasportatoreSelezionato',
        'AggiornaTrasportatore' => 'aggiorna_tabella',
    ];

    public function trasportatoreSelezionato($trasportatoreId){
        $this->selezionato = $trasportatoreId;
    }

    public function aggiorna_tabella()
    {
        $trasportatori = Trasportatore::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.trasportatori',compact('trasportatori'));
    }
    public function render()
    {
        $trasportatori = Trasportatore::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.trasportatori',compact('trasportatori'));
    }
}
