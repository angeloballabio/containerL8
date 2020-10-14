<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniValuta extends Component
{
    public function azzeraMaschera()
    {
        return redirect()->to('/valute');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-valuta');
    }
}
