<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Operazione;

class AzioniOperazioni extends Component
{
    public $ordine_id;
    public $selezionato_id = 0;

    protected $listeners = [
        'OrdineSelezionato' => 'ordineSelezionato',
    ];

    public function ordineSelezionato($ordineId){
        $this->ordine_id = $ordineId;

    }

    public function generaDistinta()
    {
        $id = $this->ordine_id;
        if($id){
            return redirect(route('genera.distinta', compact('id')));
        }

    }

    public function generaMandati()
    {
        $id = $this->ordine_id;
        if($id){
            return redirect(route('mandati', compact('id')));
        }

    }

    public function generaBollettini()
    {
        $id = $this->ordine_id;
        if ($id) {
            return redirect(route('bollettini', compact('id')));
        }

    }

    public function gestioneFornitori()
    {
        return redirect(route('fornitori'));
    }

    public function gestioneCompagnie()
    {
        return redirect(route('compagnie'));
    }

    public function gestioneDestinatari()
    {
        return redirect(route('destinatari'));
    }

    public function gestioneTrasportatori()
    {
        return redirect(route('trasportatori'));
    }

    public function gestioneConsegna()
    {
        return redirect(route('consegne'));
    }

    public function gestioneDogane()
    {
        return redirect(route('dogane'));
    }

    public function gestioneContainer()
    {
        return redirect(route('containers'));
    }

    public function gestioneValuta()
    {
        return redirect(route('valute'));
    }

    public function resaFattura()
    {
        return redirect(route('resa'));
    }

    public function azzeraMaschera()
    {
        return redirect()->to('/operazioni');
    }

    public function render()
    {
        $operazione = Operazione::where('id',$this->ordine_id)->get()->first();
        return view('livewire.azioni-operazioni',compact('operazione'));
    }
}
