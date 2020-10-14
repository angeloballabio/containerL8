<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Consegna;

class DatiConsegna extends Component
{
    public $consegna_id;
    public $soprannome, $nome, $indirizzo, $cap, $luogo, $provincia, $numero, $stato, $telefono1, $telefono2, $mobile, $fax, $mail, $piva;


    protected $listeners = [
        'ConsegnaSelezionato' => 'consegnaSelezionato',
    ];

    protected $rules = [
        'soprannome' => 'required|string|max:40',
        'nome' => 'required|string|max:255',
        'indirizzo' => 'required|string|max:255',
        'cap' => 'required|string|max:20',
        'luogo' => 'required|string|max:128',
        'provincia' => 'required|string|max:3',
        'numero' => 'required|string|max:5',
        'stato' => 'required|string|max:100',
        'telefono1' => 'required|string|max:30',
        'telefono2' => 'nullable|string|max:30',
        'mobile' => 'nullable|string|max:30',
        'fax' => 'nullable|string|max:30',
        'mail' => 'required|email',
        'piva' => 'required|string|max:20',
    ];

    public function consegnaSelezionato($consegnaId){
        $this->consegna_id = $consegnaId;

        $consegna = Consegna::where('id',$this->consegna_id)->get()->first();
        if($consegna){
            $this->soprannome = $consegna->soprannome;
            $this->nome = $consegna->nome;
            $this->indirizzo = $consegna->indirizzo;
            $this->cap = $consegna->cap;
            $this->luogo = $consegna->luogo;
            $this->provincia = $consegna->provincia;
            $this->numero = $consegna->numero;
            $this->stato = $consegna->stato;
            $this->telefono1 = $consegna->telefono1;
            $this->telefono2 = $consegna->telefono2;
            $this->mobile = $consegna->mobile;
            $this->fax = $consegna->fax;
            $this->mail = $consegna->mail;
            $this->piva = $consegna->piva;
        }

    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $consegna = new Consegna();
        $consegna->soprannome = $this->soprannome;
        $consegna->nome =$this->nome;
        $consegna->indirizzo = $this->indirizzo;
        $consegna->cap = $this->cap;
        $consegna->luogo = $this->luogo;
        $consegna->provincia = $this->provincia;
        $consegna->numero = $this->numero;
        $consegna->stato = $this->stato;
        $consegna->telefono1 = $this->telefono1;
        $consegna->telefono2 = $this->telefono2;
        $consegna->mobile = $this->mobile;
        $consegna->fax = $this->fax;
        $consegna->mail = $this->mail;
        $consegna->piva = $this->piva;
        $consegna->save();
        $this->emit('AggiornaConsegna');
        /* return redirect()->to('/gestione-consegna'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);
        $consegna = Consegna::where('id',$this->consegna_id)->get()->first();

        $consegna->soprannome = $this->soprannome;
        $consegna->nome =$this->nome;
        $consegna->indirizzo = $this->indirizzo;
        $consegna->cap = $this->cap;
        $consegna->luogo = $this->luogo;
        $consegna->provincia = $this->provincia;
        $consegna->numero = $this->numero;
        $consegna->stato = $this->stato;
        $consegna->telefono1 = $this->telefono1;
        $consegna->telefono2 = $this->telefono2;
        $consegna->mobile = $this->mobile;
        $consegna->fax = $this->fax;
        $consegna->mail = $this->mail;
        $consegna->piva = $this->piva;
        $consegna->save();
        $this->emit('AggiornaConsegna');
        /* return redirect()->to('/gestione-consegna'); */
    }

    public function cancella()
    {
        $consegna = Consegna::where('id',$this->consegna_id)->get()->first();
        $consegna->delete();
        $this->emit('AggiornaConsegna');
        /* return redirect()->to('/gestione-consegna'); */
    }

    public function render()
    {
        return view('livewire.dati-consegna');
    }
}
