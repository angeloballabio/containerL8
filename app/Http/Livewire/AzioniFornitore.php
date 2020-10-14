<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniFornitore extends Component
{
    public function azzeraMaschera()
    {

        return redirect()->to('/fornitori');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-fornitore');
    }
}
