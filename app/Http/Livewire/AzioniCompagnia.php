<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniCompagnia extends Component
{
    public function azzeraMaschera()
    {

        return redirect()->to('/compagnie');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-compagnia');
    }
}
