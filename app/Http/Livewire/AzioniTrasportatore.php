<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniTrasportatore extends Component
{
    public function azzeraMaschera()
    {

        return redirect()->to('/trasportatori');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-trasportatore');
    }
}
