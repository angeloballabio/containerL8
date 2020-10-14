<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniConsegne extends Component
{
    public function azzeraMaschera()
    {

        return redirect()->to('/consegne');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-consegne');
    }
}
