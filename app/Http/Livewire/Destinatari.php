<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinatario;
use Livewire\WithPagination;

class Destinatari extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'DestinatarioSelezionato' => 'destinatarioSelezionato',
        'AggiornaDestinario' => 'aggiorna_tabella',
    ];

    public function destinatarioSelezionato($destinatarioId){
        $this->selezionato = $destinatarioId;
    }

    public function aggiorna_tabella()
    {
        $destinatari = Destinatario::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.destinatari',compact('destinatari'));
    }

    public function render()
    {
        $destinatari = Destinatario::orderBy('soprannome','asc')->paginate(25);
        return view('livewire.destinatari',compact('destinatari'));
    }
}
