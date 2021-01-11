<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Operazione;
use App\Models\Articoli;
use App\Models\Pezzi;
use App\Models\Fornitore;
use App\Models\ElencoArticoli;
use Codedge\Fpdf\Fpdf\Fpdf;

class GeneraDistinta extends Component
{

    use WithPagination;

    public $ordine_id = 0;
    public $articolo_id = 0, $pezzo_id = 0, $selezionato=0, $selezionato_p=0;
    public $totale_colli, $totale_pezzi, $totale_lordo, $totale_netto, $totale_valore;
    public $descrizione_uk, $descrizione_it, $tot_pezzi, $tot_colli, $tot_lordo, $tot_netto, $tot_valore, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites, $fornitore_id, $codicearticolo, $trovatoarticolo, $sposta_articolo;
    public $pezzi, $colli, $lordo, $netto, $valore, $codice_articolo;
    public $articoli_take=11, $articoli_skip=0,$pezzi_take=11, $pezzi_skip=0, $articoli_count, $pezzi_count;


    protected $listeners = [
        'ArticoloSelezionato' => 'articoloSelezionato',
        'PezzoSelezionato' => 'pezzoSelezionato',
        'Aggiunto' => 'aggiunto',
        'Modificato' => 'modificato',
        'SetSpostaArticolo' => 'set_sposta_articolo',
    ];

    protected $rules = [
        'descrizione_uk' => 'required|string|max:255',
        'descrizione_it' => 'required|string|max:255',
        'voce_doganale' => 'required|string|max:12',
        'diritti_doganali' => 'nullable|numeric',
        'val_iva' => 'nullable|numeric',
        'aliquota_iva' => 'nullable|numeric',
    ];

    protected $rules_p = [
        'pezzi' => 'required|numeric|integer',
        'colli' => 'required|numeric|integer',
        'lordo' => 'required|numeric',
        'netto' => 'required|numeric',
        'valore' => 'required|numeric',
        'codice_articolo' => 'required|string|max:20',
    ];

    public function articoloSelezionato($articoloId){
        $this->articolo_id = $articoloId;
        $this->selezionato = $articoloId;

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
        $pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get();
        $this->pezzi_count = $pezzi->count();

        /* $this->pezzo_id = 0; */
        $this->pezzi = null;
        $this->colli = null;
        $this->lordo = null;
        $this->netto = null;
        $this->valore = null;
        $this->codice_articolo = null;
    }

    public function pezzoSelezionato($pezzoId){
        $this->pezzo_id = $pezzoId;
        $this->selezionato_p = $pezzoId;

        $pezzo = Pezzi::where('id','=',$this->pezzo_id)->get()->first();
        if($pezzo)
        {
            $this->pezzi = $pezzo->pezzi;
            $this->colli = $pezzo->colli;
            $this->lordo = $pezzo->lordo;
            $this->netto = $pezzo->netto;
            $this->valore = $pezzo->valore;
            $this->codice_articolo = $pezzo->codice_articolo;

        }
    }

    public function mount($id)
    {
        $this->ordine_id = $id;
        $ordine = $id;
        $articoli = Articoli::where('ordine_id','=',$id)->get()->all();
        $colli = 0;
        $pezzi = 0;
        $lordo = 0;
        $netto = 0;
        $valore = 0;
        foreach($articoli as $articolo){
            $colli = $colli + $articolo->tot_colli;
            $pezzi = $pezzi + $articolo->tot_pezzi;
            $lordo = $lordo + $articolo->tot_lordo;
            $netto = $netto + $articolo->tot_netto;
            $valore = $valore + $articolo->tot_valore;
        }
        $this->totale_colli = $colli;
        $this->totale_pezzi = $pezzi;
        $this->totale_lordo = $lordo;
        $this->totale_netto = $netto;
        $this->totale_valore = $valore;
        $operazione = Operazione::where('id','=',$id)->get()->first();
        $fornitore = Fornitore::where('soprannome','=',$operazione->nome_fornitore)->get()->first();
        $this->fornitore_id = $fornitore->id;
        $this->emit('ImpostaOrdineId',compact('ordine'));
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->get();
        $this->articoli_count = $articoli->count();
    }

    public function aggiunto()
    {
        /* dd($this->ordine_id); */
        $this->descrizione_uk = '';
        $this->descrizione_it = '';
        $this->voce_doganale = '';
        $this->diritti_doganali = 0.00;
        $this->val_iva = 0.00;
        $this->aliquota_iva = 0;
        $this->acciaio = false;
        $this->acciaio_inox = false;
        $this->plastica = false;
        $this->legno = false;
        $this->bambu = false;
        $this->vetro = false;
        $this->ceramica = false;
        $this->carta = false;
        $this->pietra = false;
        $this->posateria = false;
        $this->attrezzi_cucina = false;
        $this->richiede_ce = false;
        $this->richiede_age = false;
        $this->richiede_cites = false;
        $this->colli = null;
        $this->pezzi = null;
        $this->lordo = null;
        $this->netto = null;
        $this->valore = null;
        $this->codice_articolo = null;
        $f_id = $this->fornitore_id;
        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->skip($this->pezzi_skip)->take($this->pezzi_take)->get();
        return view('livewire.genera-distinta',compact('operazione','articoli','n_pezzi','f_id'));

    }

    public function modificato()
    {
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->get()->all();
        $colli = 0;
        $pezzi = 0;
        $lordo = 0;
        $netto = 0;
        $valore = 0;
        foreach($articoli as $articolo){
            $colli = $colli + $articolo->tot_colli;
            $pezzi = $pezzi + $articolo->tot_pezzi;
            $lordo = $lordo + $articolo->tot_lordo;
            $netto = $netto + $articolo->tot_netto;
            $valore = $valore + $articolo->tot_valore;
        }
        $this->totale_colli = $colli;
        $this->totale_pezzi = $pezzi;
        $this->totale_lordo = $lordo;
        $this->totale_netto = $netto;
        $this->totale_valore = $valore;
    }

    public function render()
    {
        #$f_id = $this->fornitore_id;
        #dd($f_id);
        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->skip($this->pezzi_skip)->take($this->pezzi_take)->get();
        return view('livewire.genera-distinta',compact('operazione','articoli','n_pezzi'));
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
        $articolo->val_iva = $this->val_iva == null ? 0.00:$this->val_iva;
        $articolo->aliquota_iva = $this->aliquota_iva == null ? 0.0:$this->aliquota_iva;
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
        $elenco_articolo->val_iva = $this->val_iva == null ? 0.00:$this->val_iva;
        $elenco_articolo->aliquota_iva = $this->aliquota_iva == null ? 0.0:$this->aliquota_iva;
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
            $elenco_articolo->val_iva = $this->val_iva == null ? 0.00:$this->val_iva;
            $elenco_articolo->aliquota_iva = $this->aliquota_iva == null ? 0.0:$this->aliquota_iva;
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
            $elenco_articolo->val_iva = $this->val_iva == null ? 0.00:$this->val_iva;
            $elenco_articolo->aliquota_iva = $this->aliquota_iva == null ? 0.0:$this->aliquota_iva;
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
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get()->all();
        foreach($n_pezzi as $pezzo)
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
        /* $this->emit('AggiuntoPezzo'); */
        $this->emit('Aggiunto');
        $this->emit('Modificato');
    }

    public function aggiungi_p()
    {
        $data = $this->validate($this->rules_p);

        $pezzo = new Pezzi();
        $pezzo->pezzi = $this->pezzi;
        $pezzo->colli = $this->colli;
        $pezzo->lordo = $this->lordo;
        $pezzo->netto = $this->netto;
        $pezzo->valore = $this->valore;
        $pezzo->codice_articolo = $this->codice_articolo;
        $pezzo->articolo_id = $this->articolo_id;
        $pezzo->ordine_id = $this->ordine_id;
        $pezzo->save();

        $i_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get()->all();
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
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        $articolo->tot_pezzi = $pezzi;
        $articolo->tot_colli = $colli;
        $articolo->tot_lordo = $lordo;
        $articolo->tot_netto = $netto;
        $articolo->tot_valore = $valore;
        $articolo->save();

        $id = $this->ordine_id;
        /* $this->emit('AggiuntoPezzo'); */
        $this->emit('Aggiunto');
        $this->emit('Modificato');

    }

    public function modifica_p()
    {
        $data = $this->validate($this->rules_p);

        $pezzo = Pezzi::where('id',$this->pezzo_id)->get()->first();

        $pezzo->pezzi = $this->pezzi;
        $pezzo->colli = $this->colli;
        $pezzo->lordo = $this->lordo;
        $pezzo->netto = $this->netto;
        $pezzo->valore = $this->valore;
        $pezzo->codice_articolo = $this->codice_articolo;
        $pezzo->articolo_id = $this->articolo_id;
        $pezzo->ordine_id = $this->ordine_id;
        $pezzo->save();

        $i_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get()->all();
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
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        $articolo->tot_pezzi = $pezzi;
        $articolo->tot_colli = $colli;
        $articolo->tot_lordo = $lordo;
        $articolo->tot_netto = $netto;
        $articolo->tot_valore = $valore;
        $articolo->save();

        $id = $this->ordine_id;
        /* $this->emit('AggiuntoPezzo'); */
        $this->emit('Aggiunto');
        $this->emit('Modificato');

    }

    public function cancella_p()
    {
        $pezzo = Pezzi::where('id',$this->pezzo_id)->get()->first();
        $pezzo->delete();
        $i_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get()->all();
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
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        $articolo->tot_pezzi = $pezzi;
        $articolo->tot_colli = $colli;
        $articolo->tot_lordo = $lordo;
        $articolo->tot_netto = $netto;
        $articolo->tot_valore = $valore;
        $articolo->save();
        $id = $this->ordine_id;
        /* $this->emit('AggiuntoPezzo'); */
        $this->emit('Aggiunto');
        $this->emit('Modificato');

    }

    public function sposta_p()
    {
        $articolo = Articoli::where('descrizione_it','=',$this->sposta_articolo)->get()->first();
        $articolo_id = $articolo->id;

        $pezzo = Pezzi::where('id',$this->pezzo_id)->get()->first();
        $pezzo->articolo_id = $articolo_id;
        $pezzo->save();
        $i_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get()->all();
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
        $articolo = Articoli::where('id',$this->articolo_id)->get()->first();
        $articolo->tot_pezzi = $pezzi;
        $articolo->tot_colli = $colli;
        $articolo->tot_lordo = $lordo;
        $articolo->tot_netto = $netto;
        $articolo->tot_valore = $valore;
        $articolo->save();

        $i_pezzi = Pezzi::where('articolo_id','=',$articolo_id)->get()->all();
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
        $articolo = Articoli::where('id',$articolo_id)->get()->first();
        $articolo->tot_pezzi = $pezzi;
        $articolo->tot_colli = $colli;
        $articolo->tot_lordo = $lordo;
        $articolo->tot_netto = $netto;
        $articolo->tot_valore = $valore;
        $articolo->save();
        /* $this->emit('AggiuntoPezzo'); */
        $this->emit('Aggiunto');
        $this->emit('Modificato');
    }

    public function set_sposta_articolo($dove)
    {
        $this->sposta_articolo = $dove;

    }

    public function stampa_distinta()
    {
        /* $id = $this->ordine_id;
        if($id){
            return redirect(route('mandati', compact('id')));
        } */

        $id = $this->ordine_id;
        if($id)
        {
            return redirect(route('stampa.distinta',compact('id')));
        }

    }

    public function ritornaIndiero()
    {
        /* dd('sono qui'); */
        return redirect(route('operazioni'));
    }

    public function manuale()
    {
        $id = $this->ordine_id;
        $fornitore_id = $this->fornitore_id;
        if($id)
        {
            #return redirect(route('importa_fattura_manuale', compact('id','fornitore_id')));

            return redirect(route('importa-fattura-manuale', ['id' => $id,'f_id' => $fornitore_id]));
        }

    }

    public function semi_automatico()
    {
        #dd('sono in semi automatico');
        $id = $this->ordine_id;
        $fornitore_id = $this->fornitore_id;
        if($id)
        {
            #return redirect(route('importa_fattura_manuale', compact('id','fornitore_id')));

            return redirect(route('fattura-semi-automatico', ['id' => $id,'f_id' => $fornitore_id]));
        }

    }

    public function diminuisci_articoli()
    {

        if($this->articoli_skip > 0)
        {
            $this->articoli_skip = $this->articoli_skip - 11;
            $this->articoli_take = 11;
        }
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->skip($this->pezzi_skip)->take($this->pezzi_take)->get();
        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        return view('livewire.genera-distinta',compact('operazione','articoli','n_pezzi'));

    }

    public function aumenta_articoli() {
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->get();
        $this->articoli_count = $articoli->count();
        if($this->articoli_skip < $this->articoli_count)
        {
            $this->articoli_skip = $this->articoli_skip + 11;
            if ($this->articoli_skip + $this->articoli_take > $this->articoli_count) {
                $this->articoli_take = $this->articoli_count - $this->articoli_skip;
                if($this->articoli_take < 0)
                {
                    $this->articoli_skip = $this->articoli_skip - 11;
                    $this->articoli_take = $this->articoli_count - $this->articoli_skip;
                }

            }
        }


        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->skip($this->pezzi_skip)->take($this->pezzi_take)->get();
        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        return view('livewire.genera-distinta',compact('operazione','articoli','n_pezzi'));
    }

    public function diminuisci_pezzi()
    {
        if($this->pezzi_skip > 0)
        {
            $this->pezzi_skip = $this->pezzi_skip - 11;
            $this->pezzi_take = 11;
        }
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->skip($this->pezzi_skip)->take($this->pezzi_take)->get();
        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        return view('livewire.genera-distinta',compact('operazione','articoli','n_pezzi'));

    }

    public function aumenta_pezzi() {
        $pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->get();
        $this->pezzi_count = $pezzi->count();
        if($this->pezzi_skip < $this->pezzi_count)
        {
            $this->pezzi_skip = $this->pezzi_skip + 11;
            if ($this->pezzi_skip + $this->pezzi_take > $this->pezzi_count) {
                $this->pezzi_take = $this->pezzi_count - $this->pezzi_skip;
                if($this->pezzi_take < 0)
                {
                    $this->pezzi_skip = $this->pezzi_skip - 11;
                    $this->pezzi_take = $this->pezzi_count- $this->pezzi_skip;
                }

            }
        }
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $n_pezzi = Pezzi::where('articolo_id','=',$this->articolo_id)->skip($this->pezzi_skip)->take($this->pezzi_take)->get();
        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        return view('livewire.genera-distinta',compact('operazione','articoli','n_pezzi'));
    }

    public function stampa_sanitari() {
        $id = $this->ordine_id;
        return redirect(route('stampa_sanitari.seleziona',compact('id')));
    }

    public function stampa_age(){
        $id = $this->ordine_id;
        return redirect(route('stampa_agej',['id' => $id]));
    }

    public function stampa_cites(){
        $id = $this->ordine_id;
        return redirect(route('stampa_cites', ['id' => $id]));
    }
}
