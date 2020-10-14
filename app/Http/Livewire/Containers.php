<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TipoContainer;
use Livewire\WithPagination;

class Containers extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'ContainerSelezionato' => 'containerSelezionato',
        'AggiornaContainer' => 'aggiorna_tabella',
    ];

    public function containerSelezionato($containerId){
        $this->selezionato = $containerId;
    }

    public function aggiorna_tabella()
    {
        $containers = TipoContainer::orderBy('tipo','asc')->paginate(25);
        return view('livewire.containers',compact('containers'));
    }
    public function render()
    {
        $containers = TipoContainer::orderBy('tipo','asc')->paginate(25);
        return view('livewire.containers',compact('containers'));
    }
}
