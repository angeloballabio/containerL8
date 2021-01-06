<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FatturaData;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\DB;
#use App\Livewire\TabellaFattura;
use Livewire\WithPagination;
use App\Models\ElencoArticoli;
use App\Models\Articoli;
use App\Models\Pezzi;



class ImportaFatturaManuale extends Component
{
    use WithPagination;

    public $ordine_id;
    public $articolo_id = 0, $selezionato=0, $articoli_take=19, $articoli_skip=0,$magazzino_take=19, $magazzino_skip=0, $articoli_count, $magazzino_count  ;
    public $descrizione_uk, $descrizione_it, $pezzi, $colli, $peso_lordo, $peso_netto, $codice_prodotto, $unita_misura, $prezzo_unitario, $prezzo_totale, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites, $f_id;
    public $PageArticoli, $PageGruppi;


    protected $listeners = [
        'PSel' => 'articoloSelezionato',
        'GSel' => 'gruppoSelezionato',
    ];

    protected $rules = [
        'descrizione_uk' => 'required|string|max:255',
        'descrizione_it' => 'required|string|max:255',
        'colli' => 'required|numeric',
        'pezzi' => 'required|numeric',
        'peso_lordo' => 'required|numeric',
        'peso_netto' => 'required|numeric',
        'codice_prodotto' => 'required|string|max:40',
        'unita_misura' => 'nullable|string|max:10',
        'prezzo_unitario' => 'nullable|numeric',
        'prezzo_totale' => 'required|numeric',
        'voce_doganale' => 'required|string|max:12',
        'diritti_doganali' => 'nullable|numeric',
        'val_iva' => 'nullable|numeric',
        'aliquota_iva' => 'nullable|numeric',
    ];


    public function mount($id,$f_id)
    {
        #dd($f_id);
        $this->selezionato = $id;
        $this->ordine_id = $id;
        $this->f_id = $f_id;
        #dd($this->ordine_id);
        #$this->emit('tabellaFattura', $id);
    }

    public function articoloSelezionato($articoloId){
        $this->articolo_id = $articoloId;
        $this->selezionato = $articoloId;

        $articolo = FatturaData::where('id',$articoloId)->get()->first();
        if($articolo){
            $this->descrizione_uk = $articolo->uk_descrizione;
            $this->descrizione_it = $articolo->it_descrizione;
            $this->pezzi = $articolo->pezzi;
            $this->colli = $articolo->colli;
            $this->unita_misura = $articolo->unita_misura;
            $this->peso_lordo = $articolo->peso_lordo;
            $this->peso_netto = $articolo->peso_netto;
            $this->prezzo_unitario = $articolo->prezzo_unitario;
            $this->prezzo_totale = $articolo->prezzo_totale;
            $this->codice_prodotto = $articolo->codice_prodotto;
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
            $this->f_id = $articolo->fornitore_id;
        }
    }

    public function gruppoSelezionato($id)
    {
        $leggi_valori = FatturaData::select('it_descrizione','voce_doganale')->where('id','=',$id)->first();
        $this->descrizione_it = $leggi_valori->it_descrizione;
        $this->voce_doganale = $leggi_valori->voce_doganale;
    }

    public function diminuisci_articoli()
    {

        if($this->articoli_skip > 0)
        {
            $this->articoli_skip = $this->articoli_skip - 19;
            $this->articoli_take = 19;
        }
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->skip($this->magazzino_skip)->take($this->magazzino_take)->get();

        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');

    }

    public function aumenta_articoli() {
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->get();
        $this->articoli_count = $articoli->count();
        if($this->articoli_skip < $this->articoli_count)
        {
            $this->articoli_skip = $this->articoli_skip + 19;
            if ($this->articoli_skip + $this->articoli_take > $this->articoli_count) {
                $this->articoli_take = $this->articoli_count - $this->articoli_skip;
                if($this->articoli_take < 0)
                {
                    $this->articoli_skip = $this->articoli_skip - 19;
                    $this->articoli_take = $this->articoli_count - $this->articoli_skip;
                }

            }
        }

        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->skip($this->magazzino_skip)->take($this->magazzino_take)->get();

        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');
    }

    public function diminuisci_magazzino()
    {
        if($this->magazzino_skip > 0)
        {
            $this->magazzino_skip = $this->magazzino_skip - 19;
            $this->magazzino_take = 19;
        }
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->skip($this->magazzino_skip)->take($this->magazzino_take)->get();

        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');

    }

    public function aumenta_magazzino() {
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->get();
        $this->magazzino_count = $gruppi->count();
        if($this->magazzino_skip < $this->magazzino_count)
        {
            $this->magazzino_skip = $this->magazzino_skip + 19;
            if ($this->magazzino_skip + $this->magazzino_take > $this->magazzino_count) {
                $this->magazzino_take = $this->magazzino_count - $this->magazzino_skip;
                if($this->magazzino_take < 0)
                {
                    $this->magazzino_skip = $this->magazzino_skip - 19;
                    $this->magazzino_take = $this->magazzino_count- $this->magazzino_skip;
                }

            }
        }
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->skip($this->magazzino_skip)->take($this->magazzino_take)->get();
        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');
    }


    public function carica_fattura()
    {
        $text = '/home/angelo/Scrivania/fattura-tipo.xls';
        $process = new Process(["python3", "/home/angelo/laravel/container/resources/Python/main.py",$text,$this->ordine_id]);
        $process->run();
        while ($process->isRunning()) {
            // waiting for process to finish
        }
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->get();
        $this->articoli_count = $articoli->count();
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->get();
        $this->magazzino_count = $gruppi->count();
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();
        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->skip($this->magazzino_skip)->take($this->magazzino_take)->get();
        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');

    }

    public function ritorna()
    {
        $id = $this->ordine_id;
        return redirect(route('genera.distinta', compact('id')));
    }

    public function modifica_fattura()
    {

        if($this->articolo_id != 0)
        {
            $this->validate($this->rules);
            $articolo = FatturaData::where('id', $this->articolo_id)->get()->first();

            $articolo->uk_descrizione = $this->descrizione_uk;
            $articolo->it_descrizione = $this->descrizione_it;
            $articolo->codice_prodotto = $this->codice_prodotto;
            $articolo->peso_lordo = $this->peso_lordo;
            $articolo->peso_netto = $this->peso_netto;
            $articolo->pezzi = $this->pezzi;
            $articolo->colli = $this->colli;
            $articolo->prezzo_unitario = $this->prezzo_unitario;
            $articolo->prezzo_totale = $this->prezzo_totale;
            $articolo->unita_misura = $this->unita_misura;
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
            $articolo->fornitore_id = $this->f_id;
            $articolo->save();
        }

    }

    public function cancella_fattura()
    {
        #dd('cancella_fattura');
        #DB::delete('delete from FatturaData where ordine_id = ?', [$this->ordine_id]);
        Fatturadata::truncate();
    }

    public function salva_distinta()
    {
        #scrive e salva gli articoli da ricordare se non sono gia definiti  ElencoArticoli
        $elenco_articoli = FatturaData::where('operazione', '=', $this->ordine_id)->get();
        foreach( $elenco_articoli as $articolo)
        {
            $articolo_esistente = ElencoArticoli::where('codice_articolo', '=', $articolo->codice_prodotto)->first();
            #dd($articolo);
            if($articolo_esistente == null){
                $nuovo_articolo = new ElencoArticoli();
                $nuovo_articolo->descrizione_uk = $articolo->uk_descrizione;
                $nuovo_articolo->descrizione_it = $articolo->it_descrizione;
                $nuovo_articolo->voce_doganale = $articolo->voce_doganale;
                $nuovo_articolo->diritti_doganali = $articolo->diritti_doganali;
                $nuovo_articolo->val_iva = $articolo->val_iva;
                $nuovo_articolo->aliquota_iva = $articolo->aliquota_iva;
                $nuovo_articolo->acciaio = $articolo->acciaio;
                $nuovo_articolo->acciaio_inox = $articolo->acciaio_inox;
                $nuovo_articolo->plastica = $articolo->plastica;
                $nuovo_articolo->legno = $articolo->legno;
                $nuovo_articolo->bambu = $articolo->bambu;
                $nuovo_articolo->vetro = $articolo->vetro;
                $nuovo_articolo->ceramica = $articolo->ceramica;
                $nuovo_articolo->carta = $articolo->carta;
                $nuovo_articolo->pietra = $articolo->pietra;
                $nuovo_articolo->posateria = $articolo->posateria;
                $nuovo_articolo->attrezzi_cucina = $articolo->attrezzi_cucina;
                $nuovo_articolo->richiede_ce = $articolo->richiede_ce;
                $nuovo_articolo->richiede_age = $articolo->richiede_age;
                $nuovo_articolo->richiede_cites = $articolo->richiede_cites;
                $nuovo_articolo->fornitore_id = $articolo->fornitore_id;
                $nuovo_articolo->codice_articolo = $articolo->codice_prodotto;
                $nuovo_articolo->fornitore_id = $articolo->fornitore_id;
                $nuovo_articolo->save();
            }
        }

        #scrive gli articoli raggruppandoli per descrizione italiano nella distinta


        $elenco_articoli = FatturaData::where('operazione', '=', $this->ordine_id)->get();
        foreach ($elenco_articoli as $articolo) {
            $sel_articolo = Articoli::where('descrizione_it', '=', $articolo->it_descrizione)->where('ordine_id','=', $this->ordine_id)->first();
            #dd($sel_articolo);
            if($sel_articolo){
                $pezzi = new Pezzi();
                $pezzi->ordine_id = $this->ordine_id;
                $pezzi->articolo_id = $sel_articolo->id; /* $articolo->id; */
                $pezzi->codice_articolo = $articolo->codice_prodotto;
                $pezzi->valore = $articolo->prezzo_totale;
                $pezzi->netto = $articolo->peso_netto;
                $pezzi->lordo = $articolo->peso_lordo;
                $pezzi->pezzi = $articolo->pezzi;
                $pezzi->colli = $articolo->colli;
                $pezzi->save();
            } else {
                $articoli = new Articoli();
                $articoli->descrizione_uk = $articolo->uk_descrizione;
                $articoli->descrizione_it = $articolo->it_descrizione;
                $articoli->ordine_id = $this->ordine_id;
                $articoli->voce_doganale = $articolo->voce_doganale;
                $articoli->diritti_doganali = $articolo->diritti_doganali;
                $articoli->val_iva = $articolo->val_iva;
                $articoli->aliquota_iva = $articolo->aliquota_iva;
                $articoli->acciaio = $articolo->acciaio;
                $articoli->acciaio_inox = $articolo->acciaio_inox;
                $articoli->plastica = $articolo->plastica;
                $articoli->legno = $articolo->legno;
                $articoli->bambu = $articolo->bambu;
                $articoli->vetro = $articolo->vetro;
                $articoli->ceramica = $articolo->ceramica;
                $articoli->carta = $articolo->carta;
                $articoli->pietra = $articolo->pietra;
                $articoli->posateria = $articolo->posateria;
                $articoli->attrezzi_cucina = $articolo->attrezzi_cucina;
                $articoli->richiede_ce = $articolo->richiede_ce;
                $articoli->richiede_age = $articolo->richiede_age;
                $articoli->richiede_cites = $articolo->richiede_cites;
                $articoli->fornitore_id = $articolo->fornitore_id;
                $articoli->save();
                $sel_articolo = Articoli::where('descrizione_it', '=', $articolo->it_descrizione)->where('ordine_id','=', $this->ordine_id)->first();
                #dd($sel_articolo);

                $pezzi = new Pezzi();
                $pezzi->ordine_id = $this->ordine_id;
                $pezzi->articolo_id = $sel_articolo->id;
                $pezzi->codice_articolo = $articolo->codice_prodotto;
                $pezzi->valore = $articolo->prezzo_totale;
                $pezzi->netto = $articolo->peso_netto;
                $pezzi->lordo = $articolo->peso_lordo;
                $pezzi->pezzi = $articolo->pezzi;
                $pezzi->colli = $articolo->colli;
                $pezzi->save();

            }

        }

        $sel_articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->get();
        foreach($sel_articoli as $sel_articolo){
            #dd($sel_articolo);
            $sel_pezzi = Pezzi::where('articolo_id', '=', $sel_articolo->id)->get();
            $totale_pezzi = 0;
            $totale_colli = 0;
            $totale_lordo = 0.0;
            $totale_netto = 0.0;
            $totale_valore = 0.0;
            foreach($sel_pezzi as $sel_pezzo){
                $totale_pezzi += $sel_pezzo->pezzi;
                $totale_colli += $sel_pezzo->colli;
                $totale_lordo += $sel_pezzo->lordo;
                $totale_netto += $sel_pezzo->netto;
                $totale_valore += $sel_pezzo->pezzi;
            }
            $sel_articolo->tot_pezzi = $totale_pezzi;
            $sel_articolo->tot_colli = $totale_colli;
            $sel_articolo->tot_lordo = $totale_lordo;
            $sel_articolo->tot_netto = $totale_netto;
            $sel_articolo->tot_valore = $totale_valore;
            $sel_articolo->save();

        }


        #cancella la fattura
        $this->cancella_fattura();


    }

    public function render()
    {
        #dd(self::$ordine_id);
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->get();
        $this->articoli_count = $articoli->count();
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->get();
        $this->magazzino_count = $gruppi->count();
        $articoli = FatturaData::where('operazione','=',$this->ordine_id)->skip($this->articoli_skip)->take($this->articoli_take)->get();

        /*
            query di esempio
            SELECT `it_descrizione`, ANY_VALUE(id) AS id, ANY_VALUE(voce_doganale) AS voce_doganale FROM fattura_data WHERE `operazione` = '66' GROUP BY `it_descrizione`
        */
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->where('operazione','=', $this->ordine_id)->groupBy('it_descrizione')->skip($this->magazzino_skip)->take($this->magazzino_take)->get();
        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');
    }


}
