<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trasportatore;

class DatiTrasportatore extends Component
{
    public $trasportatore_id;
    public $soprannome, $nome, $indirizzo, $cap, $luogo, $provincia, $numero, $stato, $telefono1, $telefono2, $mobile, $fax, $mail, $piva;


    protected $listeners = [
        'TrasportatoreSelezionato' => 'trasportatoreSelezionato',
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

    public function trasportatoreSelezionato($trasportatoreId){
        $this->trasportatore_id = $trasportatoreId;

        $trasportatore = Trasportatore::where('id',$this->trasportatore_id)->get()->first();
        if($trasportatore){
            $this->soprannome = $trasportatore->soprannome;
            $this->nome = $trasportatore->nome;
            $this->indirizzo = $trasportatore->indirizzo;
            $this->cap = $trasportatore->cap;
            $this->luogo = $trasportatore->luogo;
            $this->provincia = $trasportatore->provincia;
            $this->numero = $trasportatore->numero;
            $this->stato = $trasportatore->stato;
            $this->telefono1 = $trasportatore->telefono1;
            $this->telefono2 = $trasportatore->telefono2;
            $this->mobile = $trasportatore->mobile;
            $this->fax = $trasportatore->fax;
            $this->mail = $trasportatore->mail;
            $this->piva = $trasportatore->piva;
        }

    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $trasportatore = new Trasportatore();
        $trasportatore->soprannome = $this->soprannome;
        $trasportatore->nome =$this->nome;
        $trasportatore->indirizzo = $this->indirizzo;
        $trasportatore->cap = $this->cap;
        $trasportatore->luogo = $this->luogo;
        $trasportatore->provincia = $this->provincia;
        $trasportatore->numero = $this->numero;
        $trasportatore->stato = $this->stato;
        $trasportatore->telefono1 = $this->telefono1;
        $trasportatore->telefono2 = $this->telefono2;
        $trasportatore->mobile = $this->mobile;
        $trasportatore->fax = $this->fax;
        $trasportatore->mail = $this->mail;
        $trasportatore->piva = $this->piva;
        $trasportatore->save();
        $this->emit('AggiornaTrasportatore');
        /* return redirect()->to('/gestione-trasportatori'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);

        $trasportatore = Trasportatore::where('id',$this->trasportatore_id)->get()->first();

        $trasportatore->soprannome = $this->soprannome;
        $trasportatore->nome =$this->nome;
        $trasportatore->indirizzo = $this->indirizzo;
        $trasportatore->cap = $this->cap;
        $trasportatore->luogo = $this->luogo;
        $trasportatore->provincia = $this->provincia;
        $trasportatore->numero = $this->numero;
        $trasportatore->stato = $this->stato;
        $trasportatore->telefono1 = $this->telefono1;
        $trasportatore->telefono2 = $this->telefono2;
        $trasportatore->mobile = $this->mobile;
        $trasportatore->fax = $this->fax;
        $trasportatore->mail = $this->mail;
        $trasportatore->piva = $this->piva;
        $trasportatore->save();
        $this->emit('AggiornaTrasportatore');
        /* return redirect()->to('/gestione-trasportatori'); */
    }

    public function cancella()
    {
        $trasportatore = Trasportatore::where('id',$this->trasportatore_id)->get()->first();
        $trasportatore->delete();
        $this->emit('AggiornaTrasportatore');
        /* return redirect()->to('/gestione-trasportatori'); */
    }

    public function render()
    {
        return view('livewire.dati-trasportatore');
    }
}
