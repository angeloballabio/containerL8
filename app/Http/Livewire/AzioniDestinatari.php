<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AzioniDestinatari extends Component
{
    public function azzeraMaschera()
    {

        return redirect()->to('/destinatari');
    }

    public function ritornaIndietro()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        return view('livewire.azioni-destinatari');
    }
}
