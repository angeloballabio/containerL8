<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fornitore;

class DatiFornitore extends Component
{
    public $fornitore_id;
    public $soprannome, $nome, $indirizzo, $cap, $luogo, $provincia, $numero, $stato, $telefono1, $telefono2, $mobile, $fax, $mail, $piva;

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

    protected $listeners = [
        'FornitoreSelezionato' => 'fornitoreSelezionato',
    ];

    public function fornitoreSelezionato($fornitoreId){
        $this->fornitore_id = $fornitoreId;

        $fornitore = Fornitore::where('id',$this->fornitore_id)->get()->first();
        if($fornitore){
            $this->soprannome = $fornitore->soprannome;
            $this->nome = $fornitore->nome;
            $this->indirizzo = $fornitore->indirizzo;
            $this->cap = $fornitore->cap;
            $this->luogo = $fornitore->luogo;
            $this->provincia = $fornitore->provincia;
            $this->numero = $fornitore->numero;
            $this->stato = $fornitore->stato;
            $this->telefono1 = $fornitore->telefono1;
            $this->telefono2 = $fornitore->telefono2;
            $this->mobile = $fornitore->mobile;
            $this->fax = $fornitore->fax;
            $this->mail = $fornitore->mail;
            $this->piva = $fornitore->piva;
        }

    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $fornitore = new Fornitore();
        $fornitore->soprannome = $this->soprannome;
        $fornitore->nome =$this->nome;
        $fornitore->indirizzo = $this->indirizzo;
        $fornitore->cap = $this->cap;
        $fornitore->luogo = $this->luogo;
        $fornitore->provincia = $this->provincia;
        $fornitore->numero = $this->numero;
        $fornitore->stato = $this->stato;
        $fornitore->telefono1 = $this->telefono1;
        $fornitore->telefono2 = $this->telefono2;
        $fornitore->mobile = $this->mobile;
        $fornitore->fax = $this->fax;
        $fornitore->mail = $this->mail;
        $fornitore->piva = $this->piva;
        $fornitore->save();
        $this->emit('AggiornaFornitore');
        /* return redirect()->to('/gestione-fornitori'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);

        $fornitore = Fornitore::where('id',$this->fornitore_id)->get()->first();

        $fornitore->soprannome = $this->soprannome;
        $fornitore->nome =$this->nome;
        $fornitore->indirizzo = $this->indirizzo;
        $fornitore->cap = $this->cap;
        $fornitore->luogo = $this->luogo;
        $fornitore->provincia = $this->provincia;
        $fornitore->numero = $this->numero;
        $fornitore->stato = $this->stato;
        $fornitore->telefono1 = $this->telefono1;
        $fornitore->telefono2 = $this->telefono2;
        $fornitore->mobile = $this->mobile;
        $fornitore->fax = $this->fax;
        $fornitore->mail = $this->mail;
        $fornitore->piva = $this->piva;
        $fornitore->save();
        $this->emit('AggiornaFornitore');
        /* return redirect()->to('/gestione-fornitori'); */
    }

    public function cancella()
    {
        $fornitore = Fornitore::where('id',$this->fornitore_id)->get()->first();
        $fornitore->delete();
        $this->emit('AggiornaFornitore');
        /* return redirect()->to('/gestione-fornitori'); */
    }

    public function render()
    {
        return view('livewire.dati-fornitore');
    }
}
