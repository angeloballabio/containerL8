<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dogana;

class DatiDogana extends Component
{
    public $dogana_id;
    public $soprannome, $nome, $indirizzo, $cap, $luogo, $provincia, $numero, $stato, $telefono1, $telefono2, $mobile, $fax, $mail, $piva;


    protected $listeners = [
        'DoganaSelezionato' => 'doganaSelezionato',
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

    public function doganaSelezionato($doganaId){
        $this->dogana_id = $doganaId;

        $dogana = Dogana::where('id',$this->dogana_id)->get()->first();
        if($dogana){
            $this->soprannome = $dogana->soprannome;
            $this->nome = $dogana->nome;
            $this->indirizzo = $dogana->indirizzo;
            $this->cap = $dogana->cap;
            $this->luogo = $dogana->luogo;
            $this->provincia = $dogana->provincia;
            $this->numero = $dogana->numero;
            $this->stato = $dogana->stato;
            $this->telefono1 = $dogana->telefono1;
            $this->telefono2 = $dogana->telefono2;
            $this->mobile = $dogana->mobile;
            $this->fax = $dogana->fax;
            $this->mail = $dogana->mail;
            $this->piva = $dogana->piva;
        }

    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $dogana = new Dogana();
        $dogana->soprannome = $this->soprannome;
        $dogana->nome =$this->nome;
        $dogana->indirizzo = $this->indirizzo;
        $dogana->cap = $this->cap;
        $dogana->luogo = $this->luogo;
        $dogana->provincia = $this->provincia;
        $dogana->numero = $this->numero;
        $dogana->stato = $this->stato;
        $dogana->telefono1 = $this->telefono1;
        $dogana->telefono2 = $this->telefono2;
        $dogana->mobile = $this->mobile;
        $dogana->fax = $this->fax;
        $dogana->mail = $this->mail;
        $dogana->piva = $this->piva;
        $dogana->save();
        $this->emit('AggiornaDogana');
        /* return redirect()->to('/gestione-dogane'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);

        $dogana = Dogana::where('id',$this->dogana_id)->get()->first();

        $dogana->soprannome = $this->soprannome;
        $dogana->nome =$this->nome;
        $dogana->indirizzo = $this->indirizzo;
        $dogana->cap = $this->cap;
        $dogana->luogo = $this->luogo;
        $dogana->provincia = $this->provincia;
        $dogana->numero = $this->numero;
        $dogana->stato = $this->stato;
        $dogana->telefono1 = $this->telefono1;
        $dogana->telefono2 = $this->telefono2;
        $dogana->mobile = $this->mobile;
        $dogana->fax = $this->fax;
        $dogana->mail = $this->mail;
        $dogana->piva = $this->piva;
        $dogana->save();
        $this->emit('AggiornaDogana');
        /* return redirect()->to('/gestione-dogane'); */
    }

    public function cancella()
    {
        $dogana = Dogana::where('id',$this->dogana_id)->get()->first();
        $dogana->delete();
        $this->emit('AggiornaDogana');
        /* return redirect()->to('/gestione-dogane'); */
    }

    public function render()
    {
        return view('livewire.dati-dogana');
    }
}
