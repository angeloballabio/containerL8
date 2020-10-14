<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Articoli;
use App\Models\Fornitore;
use App\Models\Operazione;
use App\Models\Pezzi;
use App\Models\ElencoArticoli;

class DatiArticolo extends Component
{
    public $articolo_id = 0;
    public $descrizione_uk, $descrizione_it, $tot_pezzi, $tot_colli, $tot_lordo, $tot_netto, $tot_valore, $ordine_id, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites,$fornitore_id, $codicearticolo, $trovatoarticolo, $sposta_articolo;



    protected $listeners = [
        'ArticoloSelezionato' => 'articoloSelezionato',
        /* 'ImpostaOrdineId' => 'impostaOrdineId', */
    ];

    protected $rules = [
        'descrizione_uk' => 'required|string|max:255',
        'descrizione_it' => 'required|string|max:255',
        'voce_doganale' => 'required|string|max:12',
        'diritti_doganali' => 'nullable|numeric',
        'val_iva' => 'nullable|numeric',
        'aliquota_iva' => 'nullable|numeric',

    ];

    public function mount($id)
    {
        $this->ordine_id = $id;
        $operazione = Operazione::where('id','=',$id)->get()->first();
        $fornitore = Fornitore::where('soprannome','=',$operazione->nome_fornitore)->get()->first();
        $this->fornitore_id = $fornitore->id;
    }

    /* public function impostaOrdineId($id)
    {
        $this->ordine_id = $id;
        $operazione = Operazione::where('id','=',$id)->get()->first();
        $fornitore = Fornitore::where('soprannome','=',$operazione->nome_fornitore)->get()->first();
        $this->fornitore_id = $fornitore->id;
    } */

    public function articoloSelezionato($articoloId){
        $this->articolo_id = $articoloId;
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        if($articolo){
            $this->descrizione_uk = $articolo->descrizione_uk;
            $this->descrizione_it = $articolo->descrizione_it;
            $this->tot_pezzi = $articolo->tot_pezzi;
            $this->tot_colli = $articolo->tot_colli;
            $this->tot_lordo = $articolo->tot_lordo;
            $this->tot_netto = $articolo->tot_netto;
            $this->tot_valore = $articolo->tot_valore;
            $this->ordine_id = $articolo->ordine_id;
            $this->voce_doganale = $articolo->voce_doganale;
            $this->diritti_doganali = $articolo->diritti_doganali;
            $this->val_iva = $articolo->val_iva;
            $this->aliquota_iva = $articolo->aliquota_iva;
            $this->acciaio = $articolo->acciaio == 1 ? 'true':'';
            $this->acciaio_inox = $articolo->acciaio_inox == 1 ? 'true':'';
            $this->plastica = $articolo->plastica == 1 ? 'true':'';
            $this->legno = $articolo->legno == 1 ? 'true':'';
            $this->bambu = $articolo->bambu == 1 ? 'true':'';
            $this->vetro = $articolo->vetro == 1 ? 'true':'';
            $this->ceramica = $articolo->ceramica == 1 ? 'true':'';
            $this->carta = $articolo->carta == 1 ? 'true':'';
            $this->pietra = $articolo->pietra == 1 ? 'true':'';
            $this->posateria = $articolo->posateria == 1 ? 'true':'';
            $this->attrezzi_cucina = $articolo->attrezzi_cucina == 1 ? 'true':'';
            $this->richiede_ce = $articolo->richiede_ce == 1 ? 'true':'';
            $this->richiede_age = $articolo->richiede_age == 1 ? 'true':'';
            $this->richiede_cites = $articolo->richiede_cites == 1 ? 'true':'';
            $this->fornitore_id = $articolo->fornitore_id;
        }
    }

    public function aggiungi()
    {
        $data = $this->validate($this->rules);
        $articolo = new Articoli();
        $articolo->descrizione_uk = $this->descrizione_uk;
        $articolo->descrizione_it = $this->descrizione_it;
        $articolo->tot_pezzi = $this->tot_pezzi == null ? 0:$this->tot_pezzi;
        $articolo->tot_colli = $this->tot_colli == null ? 0:$this->tot_colli;
        $articolo->tot_lordo = $this->tot_lordo == null ? 0:$this->tot_lordo;
        $articolo->tot_netto = $this->tot_netto == null ? 0:$this->tot_netto;
        $articolo->tot_valore = $this->tot_valore == null ? 0:$this->tot_valore;
        $articolo->ordine_id = $this->ordine_id;
        $articolo->voce_doganale = $this->voce_doganale;
        $articolo->diritti_doganali = $this->diritti_doganali == null ? 0.00:$this->diritti_doganali;
        $articolo->val_iva = $this->val_iva == null ? 0:$this->val_iva;
        $articolo->aliquota_iva = $this->aliquota_iva == null ? 0:$this->aliquota_iva;
        $articolo->acciaio = $this->acciaio == true ? '1':'0';
        $articolo->acciaio_inox = $this->acciaio_inox == true ? '1':'0';
        $articolo->plastica = $this->plastica == true ? '1':'0';
        $articolo->legno = $this->legno == true ? '1':'0';
        $articolo->bambu = $this->bambu == true ? '1':'0';
        $articolo->vetro = $this->vetro == true ? '1':'0';
        $articolo->ceramica = $this->ceramica == true ? '1':'0';
        $articolo->carta = $this->carta == true ? '1':'0';
        $articolo->pietra = $this->pietra == true ? '1':'0';
        $articolo->posateria = $this->posateria == true ? '1':'0';
        $articolo->attrezzi_cucina = $this->attrezzi_cucina == true ? '1':'0';
        $articolo->richiede_ce = $this->richiede_ce == true ? '1':'0';
        $articolo->richiede_age = $this->richiede_age == true ? '1':'0';
        $articolo->richiede_cites = $this->richiede_cites == true ? '1':'0';
        $articolo->fornitore_id = $this->fornitore_id;
        $articolo->save();

        $elenco_articolo = new ElencoArticoli();
        $elenco_articolo->descrizione_uk = $this->descrizione_uk;
        $elenco_articolo->descrizione_it = $this->descrizione_it;
        $elenco_articolo->voce_doganale = $this->voce_doganale;
        $elenco_articolo->diritti_doganali = $this->diritti_doganali == null ? 0.00:$this->diritti_doganali;
        $elenco_articolo->val_iva = $this->val_iva == null ? 0:$this->val_iva;
        $elenco_articolo->aliquota_iva = $this->aliquota_iva == null ? 0:$this->aliquota_iva;
        $elenco_articolo->acciaio = $this->acciaio == true ? '1':'0';
        $elenco_articolo->acciaio_inox = $this->acciaio_inox == true ? '1':'0';
        $elenco_articolo->plastica = $this->plastica == true ? '1':'0';
        $elenco_articolo->legno = $this->legno == true ? '1':'0';
        $elenco_articolo->bambu = $this->bambu == true ? '1':'0';
        $elenco_articolo->vetro = $this->vetro == true ? '1':'0';
        $elenco_articolo->ceramica = $this->ceramica == true ? '1':'0';
        $elenco_articolo->carta = $this->carta == true ? '1':'0';
        $elenco_articolo->pietra = $this->pietra == true ? '1':'0';
        $elenco_articolo->posateria = $this->posateria == true ? '1':'0';
        $elenco_articolo->attrezzi_cucina = $this->attrezzi_cucina == true ? '1':'0';
        $elenco_articolo->richiede_ce = $this->richiede_ce == true ? '1':'0';
        $elenco_articolo->richiede_age = $this->richiede_age == true ? '1':'0';
        $elenco_articolo->richiede_cites = $this->richiede_cites == true ? '1':'0';
        $elenco_articolo->fornitore_id = $this->fornitore_id;
        $elenco_articolo->save();

        $id = $this->ordine_id;
        $this->emit('Aggiunto');

    }

    public function modifica()
    {
        $this->validate($this->rules);
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();

        $articolo->descrizione_uk = $this->descrizione_uk;
        $articolo->descrizione_it = $this->descrizione_it;
        $articolo->tot_pezzi = $this->tot_pezzi;
        $articolo->tot_colli = $this->tot_colli;
        $articolo->tot_lordo = $this->tot_lordo;
        $articolo->tot_netto = $this->tot_netto;
        $articolo->tot_valore = $this->tot_valore;
        $articolo->ordine_id = $this->ordine_id;
        $articolo->voce_doganale = $this->voce_doganale;
        $articolo->diritti_doganali = $this->diritti_doganali;
        $articolo->val_iva = $this->val_iva;
        $articolo->aliquota_iva = $this->aliquota_iva;
        $articolo->acciaio = $this->acciaio == true ? '1':'0';
        $articolo->acciaio_inox = $this->acciaio_inox == true ? '1':'0';
        $articolo->plastica = $this->plastica == true ? '1':'0';
        $articolo->legno = $this->legno == true ? '1':'0';
        $articolo->bambu = $this->bambu == true ? '1':'0';
        $articolo->vetro = $this->vetro == true ? '1':'0';
        $articolo->ceramica = $this->ceramica == true ? '1':'0';
        $articolo->carta = $this->carta == true ? '1':'0';
        $articolo->pietra = $this->pietra == true ? '1':'0';
        $articolo->posateria = $this->posateria == true ? '1':'0';
        $articolo->attrezzi_cucina = $this->attrezzi_cucina == true ? '1':'0';
        $articolo->richiede_ce = $this->richiede_ce == true ? '1':'0';
        $articolo->richiede_age = $this->richiede_age == true ? '1':'0';
        $articolo->richiede_cites = $this->richiede_cites == true ? '1':'0';
        $articolo->fornitore_id = $this->fornitore_id;
        $articolo->save();

        $elenco_articolo = ElencoArticoli::where('fornitore_id', '=', $this->fornitore_id)->where('voce_doganale', '=', $this->voce_doganale)->get()->first();
        if($elenco_articolo)
        {
            $elenco_articolo->descrizione_uk = $this->descrizione_uk;
            $elenco_articolo->descrizione_it = $this->descrizione_it;
            $elenco_articolo->voce_doganale = $this->voce_doganale;
            $elenco_articolo->diritti_doganali = $this->diritti_doganali == null ? 0.00:$this->diritti_doganali;
            $elenco_articolo->val_iva = $this->val_iva == null ? 0:$this->val_iva;
            $elenco_articolo->aliquota_iva = $this->aliquota_iva == null ? 0:$this->aliquota_iva;
            $elenco_articolo->acciaio = $this->acciaio == true ? '1':'0';
            $elenco_articolo->acciaio_inox = $this->acciaio_inox == true ? '1':'0';
            $elenco_articolo->plastica = $this->plastica == true ? '1':'0';
            $elenco_articolo->legno = $this->legno == true ? '1':'0';
            $elenco_articolo->bambu = $this->bambu == true ? '1':'0';
            $elenco_articolo->vetro = $this->vetro == true ? '1':'0';
            $elenco_articolo->ceramica = $this->ceramica == true ? '1':'0';
            $elenco_articolo->carta = $this->carta == true ? '1':'0';
            $elenco_articolo->pietra = $this->pietra == true ? '1':'0';
            $elenco_articolo->posateria = $this->posateria == true ? '1':'0';
            $elenco_articolo->attrezzi_cucina = $this->attrezzi_cucina == true ? '1':'0';
            $elenco_articolo->richiede_ce = $this->richiede_ce == true ? '1':'0';
            $elenco_articolo->richiede_age = $this->richiede_age == true ? '1':'0';
            $elenco_articolo->richiede_cites = $this->richiede_cites == true ? '1':'0';
            $elenco_articolo->fornitore_id = $this->fornitore_id;
            $elenco_articolo->save();
        }
        else
        {
            $elenco_articolo = new ElencoArticoli();
            $elenco_articolo->descrizione_uk = $this->descrizione_uk;
            $elenco_articolo->descrizione_it = $this->descrizione_it;
            $elenco_articolo->voce_doganale = $this->voce_doganale;
            $elenco_articolo->diritti_doganali = $this->diritti_doganali == null ? 0.00:$this->diritti_doganali;
            $elenco_articolo->val_iva = $this->val_iva == null ? 0:$this->val_iva;
            $elenco_articolo->aliquota_iva = $this->aliquota_iva == null ? 0:$this->aliquota_iva;
            $elenco_articolo->acciaio = $this->acciaio == true ? '1':'0';
            $elenco_articolo->acciaio_inox = $this->acciaio_inox == true ? '1':'0';
            $elenco_articolo->plastica = $this->plastica == true ? '1':'0';
            $elenco_articolo->legno = $this->legno == true ? '1':'0';
            $elenco_articolo->bambu = $this->bambu == true ? '1':'0';
            $elenco_articolo->vetro = $this->vetro == true ? '1':'0';
            $elenco_articolo->ceramica = $this->ceramica == true ? '1':'0';
            $elenco_articolo->carta = $this->carta == true ? '1':'0';
            $elenco_articolo->pietra = $this->pietra == true ? '1':'0';
            $elenco_articolo->posateria = $this->posateria == true ? '1':'0';
            $elenco_articolo->attrezzi_cucina = $this->attrezzi_cucina == true ? '1':'0';
            $elenco_articolo->richiede_ce = $this->richiede_ce == true ? '1':'0';
            $elenco_articolo->richiede_age = $this->richiede_age == true ? '1':'0';
            $elenco_articolo->richiede_cites = $this->richiede_cites == true ? '1':'0';
            $elenco_articolo->fornitore_id = $this->fornitore_id;
            $elenco_articolo->save();
        }
        $id = $this->ordine_id;

        $this->emit('Aggiunto');
    }

    public function cancella()
    {
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        $articolo->delete();
        $id = $this->ordine_id;

        $this->emit('Aggiunto');
    }

    public function trova_articolo()
    {

        $pezzo = Pezzi::where('ordine_id','=',$this->ordine_id)->where('codice_articolo','=',$this->codicearticolo)->get()->first();

        if($pezzo)
        {
            $articolo = Articoli::where('id','=',$pezzo->articolo_id)->get()->first();
            $this->trovatoarticolo = $articolo->descrizione_it;
        }
        else{
            $this->trovatoarticolo = 'Articolo non trovato.';
        }

    }

    public function ricarica()
    {
        $this->emit('Aggiunto');
    }

    public function spostaarticolo()
    {
        $this->emit('SetSpostaArticolo',$this->sposta_articolo);
    }

    public function sposta()
    {
        $articolo = Articoli::where('descrizione_it','=',$this->sposta_articolo)->get()->first();
        $articolo_destinazione_id = $articolo->id;
        $pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get()->all();
        foreach($pezzi as $pezzo)
        {
            $pezzo->articolo_id = $articolo_destinazione_id;
            $pezzo->save();
        }
        $i_pezzi = Pezzi::where('articolo_id','=',$articolo_destinazione_id)->get()->all();
        $pezzi = 0;
        $colli = 0;
        $lordo = 0;
        $netto = 0;
        $valore = 0;
        foreach($i_pezzi as $pezzo){
            $pezzi = $pezzi + $pezzo->pezzi;
            $colli = $colli + $pezzo->colli;
            $lordo = $lordo + $pezzo->lordo;
            $netto = $netto + $pezzo->netto;
            $valore = $valore + $pezzo->valore;
        }
        $articolo = Articoli::where('id',$articolo_destinazione_id)->get()->first();
        $articolo->tot_pezzi = $pezzi;
        $articolo->tot_colli = $colli;
        $articolo->tot_lordo = $lordo;
        $articolo->tot_netto = $netto;
        $articolo->tot_valore = $valore;
        $articolo->save();
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        $articolo->tot_pezzi = 0;
        $articolo->tot_colli = 0;
        $articolo->tot_lordo = 0;
        $articolo->tot_netto = 0;
        $articolo->tot_valore = 0;
        $articolo->save();
        $this->emit('AggiuntoPezzo');
        $this->emit('Aggiunto');
        $this->emit('Modificato');
    }

    public function render()
    {
        $spostaArticoli = Articoli::where('ordine_id','=',$this->ordine_id)->get();
        return view('livewire.dati-articolo', compact('spostaArticoli'));
    }
}
