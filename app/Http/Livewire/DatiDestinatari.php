<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Destinatario;

class DatiDestinatari extends Component
{
    public $destinatario_id;
    public $soprannome, $nome, $indirizzo, $cap, $luogo, $provincia, $numero, $stato, $telefono1, $telefono2, $mobile, $fax, $mail, $piva, $responsabile;


    protected $listeners = [
        'DestinatarioSelezionato' => 'destinatarioSelezionato',
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
        'responsabile' => 'required|string|max:40'
    ];

    public function destinatarioSelezionato($destinatarioId){
        $this->destinatario_id = $destinatarioId;

        $destinatario = Destinatario::where('id',$this->destinatario_id)->get()->first();
        if($destinatario){
            $this->soprannome = $destinatario->soprannome;
            $this->nome = $destinatario->nome;
            $this->indirizzo = $destinatario->indirizzo;
            $this->cap = $destinatario->cap;
            $this->luogo = $destinatario->luogo;
            $this->provincia = $destinatario->provincia;
            $this->numero = $destinatario->numero;
            $this->stato = $destinatario->stato;
            $this->telefono1 = $destinatario->telefono1;
            $this->telefono2 = $destinatario->telefono2;
            $this->mobile = $destinatario->mobile;
            $this->fax = $destinatario->fax;
            $this->mail = $destinatario->mail;
            $this->piva = $destinatario->piva;
            $this->responsabile = $destinatario->responsabile;
        }

    }

    public function aggiungi()
    {
        $this->validate($this->rules);

        $destinatario = new Destinatario();
        $destinatario->soprannome = $this->soprannome;
        $destinatario->nome =$this->nome;
        $destinatario->indirizzo = $this->indirizzo;
        $destinatario->cap = $this->cap;
        $destinatario->luogo = $this->luogo;
        $destinatario->provincia = $this->provincia;
        $destinatario->numero = $this->numero;
        $destinatario->stato = $this->stato;
        $destinatario->telefono1 = $this->telefono1;
        $destinatario->telefono2 = $this->telefono2;
        $destinatario->mobile = $this->mobile;
        $destinatario->fax = $this->fax;
        $destinatario->mail = $this->mail;
        $destinatario->piva = $this->piva;
        $destinatario->responsabile = $this->responsabile;
        $destinatario->save();
        $this->emit('AggiornaDestinatario');
        /* return redirect()->to('/gestione-destinatari'); */
    }

    public function modifica()
    {
        $this->validate($this->rules);

        $destinatario = Destinatario::where('id',$this->destinatario_id)->get()->first();

        $destinatario->soprannome = $this->soprannome;
        $destinatario->nome =$this->nome;
        $destinatario->indirizzo = $this->indirizzo;
        $destinatario->cap = $this->cap;
        $destinatario->luogo = $this->luogo;
        $destinatario->provincia = $this->provincia;
        $destinatario->numero = $this->numero;
        $destinatario->stato = $this->stato;
        $destinatario->telefono1 = $this->telefono1;
        $destinatario->telefono2 = $this->telefono2;
        $destinatario->mobile = $this->mobile;
        $destinatario->fax = $this->fax;
        $destinatario->mail = $this->mail;
        $destinatario->piva = $this->piva;
        $destinatario->responsabile = $this->responsabile;
        $destinatario->save();
        $this->emit('AggiornaDestinatario');
        /* return redirect()->to('/gestione-destinatari'); */
    }

    public function cancella()
    {
        $destinatario = Destinatario::where('id',$this->destinatario_id)->get()->first();
        $destinatario->delete();
        $this->emit('AggiornaDestinatario');
        /* return redirect()->to('/gestione-destinatari'); */
    }

    public function render()
    {
        return view('livewire.dati-destinatari');
    }
}
