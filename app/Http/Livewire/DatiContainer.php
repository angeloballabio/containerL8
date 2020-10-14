<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TipoContainer;

class DatiContainer extends Component
{
    public $container_id;
    public $tipo;

    protected $listeners = [
        'ContainerSelezionato' => 'containerSelezionato',
    ];

    protected $rules = [
        'tipo' => 'required|string|max:40',
    ];

    public function containerSelezionato($containerId){
        $this->container_id = $containerId;

        $container = TipoContainer::where('id',$this->container_id)->get()->first();
        if($container){
            $this->tipo = $container->tipo;
        }
    }

    public function aggiungi()
    {
        $this->validate($this->rules);
        $container = new TipoContainer();
        $container->tipo = $this->tipo;
        $container->save();
        $this->emit('AggiornaConteiner');
        /* return redirect()->to('/gestione-container'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);
        $container = TipoContainer::where('id',$this->container_id)->get()->first();

        /* $container = new Container(); */
        $container->tipo = $this->tipo;
        $container->save();
        $this->emit('AggiornaConteiner');
        /* return redirect()->to('/gestione-container'); */
    }

    public function cancella()
    {
        $container = TipoContainer::where('id',$this->container_id)->get()->first();
        $container->delete();
        $this->emit('AggiornaConteiner');
        /* return redirect()->to('/gestione-container'); */
    }

    public function render()
    {
        return view('livewire.dati-container');
    }
}
