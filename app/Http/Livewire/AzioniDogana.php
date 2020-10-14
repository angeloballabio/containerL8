<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniDogana extends Component
{
    public function azzeraMaschera()
    {

        return redirect()->to('/dogane');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-dogana');
    }
}
