<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniResa extends Component
{
    public function azzeraMaschera()
    {
        return redirect()->to('/resa');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-resa');
    }
}
