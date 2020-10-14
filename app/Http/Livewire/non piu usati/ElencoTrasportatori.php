<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trasportatore;
use Livewire\WithPagination;

class ElencoTrasportatori extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'TrasportatoreSelezionato' => 'trasportatoreSelezionato',
        'AggiornaTrasportatore' => 'aggiorna_tablella',
    ];

    public function trasportatoreSelezionato($trasportatoreId){
        $this->selezionato = $trasportatoreId;
    }

    public function aggiorna_tabella()
    {
        $trasportatori = Trasportatore::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-fornitori',compact('trasportatori'));
    }

    public function render()
    {
        $trasportatori = Trasportatore::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-trasportatori',compact('trasportatori'));
    }
}
