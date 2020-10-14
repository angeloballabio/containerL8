<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ResaFattura;

class DatiResa extends Component
{
    public $resa_id;
    public $iso, $descrizione;

    protected $listeners = [
        'ResaSelezionato' => 'resaSelezionato',
    ];

    protected $rules = [
        'iso' => 'required|string|max:4',
        'descrizione' => 'required|string|max:255',
    ];

    public function resaSelezionato($resaId){
        $this->resa_id = $resaId;

        $resa = ResaFattura::where('id',$this->resa_id)->get()->first();
        if($resa){
            $this->iso = $resa->iso;
            $this->descrizione = $resa->descrizione;
        }
    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $resa = new ResaFattura();
        $resa->iso = $this->iso;
        $resa->descrizione = $this->descrizione;
        $resa->save();
        $this->emit('AggiornaResa');
        /* return redirect()->to('/resa-fattura'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);

        $resa = ResaFattura::where('id',$this->resa_id)->get()->first();

        /* $valuta = new valuta(); */
        $resa->iso = $this->iso;
        $resa->descrizione = $this->descrizione;
        $resa->save();
        $this->emit('AggiornaResa');
        /* return redirect()->to('/resa-fattura'); */
    }

    public function cancella()
    {
        $resa = ResaFattura::where('id',$this->resa_id)->get()->first();
        $resa->delete();
        $this->emit('AggiornaResa');
        /* return redirect()->to('/resa-fattura'); */
    }
    public function render()
    {
        return view('livewire.dati-resa');
    }
}
