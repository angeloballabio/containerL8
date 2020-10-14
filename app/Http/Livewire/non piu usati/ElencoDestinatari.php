<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinatario;
use Livewire\WithPagination;

class ElencoDestinatari extends Component
{
    use WithPagination;

    public $selezionato = 0;

    protected $listeners = [
        'DestinatarioSelezionato' => 'destinatarioSelezionato',
        'AggiornaDestinario' => 'aggiorna_tablella',
    ];

    public function destinatarioSelezionato($destinatarioId){
        $this->selezionato = $destinatarioId;
    }

    public function aggiorna_tabella()
    {
        $destinatari = Destinatario::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-fornitori',compact('destinatari'));
    }

    public function render()
    {
        $destinatari = Destinatario::orderBy('soprannome','asc')->paginate(17);
        return view('livewire.elenco-destinatari',compact('destinatari'));
    }
}
