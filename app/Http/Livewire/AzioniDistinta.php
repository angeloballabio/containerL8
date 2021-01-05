<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniDistinta extends Component
{
    public $ordine_id, $fornitore_id;
    public $totali;

    public function mount($id,$fornitore_id)
    {

        dd($fornitore_id);
        $this->ordine_id = $id;
        $this->fornitore_id = $fornitore_id;
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

    public function manuale()
    {
        $id = $this->ordine_id;
        $fornitore_id = $this->fornitore_id;
        dd($fornitore_id);
        if($id)
        {
            return redirect(route('importa_fattura_manuale', compact('id','fornitore_id')));
        }

    }

    public function render()
    {
        return view('livewire.azioni-distinta');
    }
}
