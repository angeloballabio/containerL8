<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniContainer extends Component
{
    public function azzeraMaschera()
    {
        return redirect()->to('/containers');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-container');
    }
}
