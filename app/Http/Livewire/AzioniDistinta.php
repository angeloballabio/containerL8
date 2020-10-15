<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniDistinta extends Component
{
    public $ordine_id;
    public $totali;

    public function mount($id)
    {
        $this->ordine_id = $id;

    }

    public function stampa_distinta()
    {
        /* $id = $this->ordine_id;
        if($id){
            return redirect(route('mandati', compact('id')));
        } */

        $id = $this->ordine_id;
        if($id)
        {
            return redirect(route('stampa.distinta',compact('id')));
        }

    }

    public function ritornaIndiero()
    {
        /* dd('sono qui'); */
        return redirect(route('operazioni'));
    }

    public function render()
    {
        return view('livewire.azioni-distinta');
    }
}
