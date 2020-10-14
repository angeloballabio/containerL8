<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Compagnia;

class DatiCompagnia extends Component
{
    public $compagnia_id;
    public $nome, $indirizzo_web, $contatto;

    protected $listeners = [
        'CompagniaSelezionato' => 'compagniaSelezionato',
    ];

    protected $rules = [
        'nome' => 'required|string|max:255',
        'indirizzo_web' => 'required|string|max:255',
        'contatto' => 'nullable|string|max:128',
    ];

    public function compagniaSelezionato($compagniaId){
        $this->compagnia_id = $compagniaId;

        $compagnia = Compagnia::where('id',$this->compagnia_id)->get()->first();
        if($compagnia){
            $this->nome = $compagnia->nome;
            $this->indirizzo_web = $compagnia->indirizzo_web;
            $this->contatto = $compagnia->contatto;
        }

    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $compagnia = new Compagnia();
        $compagnia->nome = $this->nome;
        $compagnia->indirizzo_web =$this->indirizzo_web;
        $compagnia->contatto = $this->contatto;
        $compagnia->save();
        $this->emit('AggiornaCompagnia');
        /* return redirect()->to('/gestione-compagnie'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);

        $compagnia = Compagnia::where('id',$this->compagnia_id)->get()->first();

        /* $compagnia = new Compagnia(); */
        $compagnia->nome = $this->nome;
        $compagnia->indirizzo_web =$this->indirizzo_web;
        $compagnia->contatto = $this->contatto;
        $compagnia->save();
        $this->emit('AggiornaCompagnia');
        /* return redirect()->to('/gestione-compagnie'); */
    }

    public function cancella()
    {
        $compagnia = Compagnia::where('id',$this->compagnia_id)->get()->first();
        $compagnia->delete();
        $this->emit('AggiornaCompagnia');
        /* return redirect()->to('/gestione-compagnie'); */
    }
    public function render()
    {
        return view('livewire.dati-compagnia');
    }
}
