<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FatturaData;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class ImportaFatturaManuale extends Component
{
    use WithPagination;

    public $ordine_id;
    public $articolo_id = 0, $selezionato=0;
    public $descrizione_uk, $descrizione_it, $pezzi, $colli, $peso_lordo, $peso_netto, $codice_prodotto, $unita_misura, $prezzo_unitario, $prezzo_totale, $voce_doganale, $diritti_doganali=0, $val_iva=0, $aliquota_iva=0, $acciaio, $acciaio_inox, $plastica, $legno, $bambu, $vetro, $ceramica, $carta, $pietra, $posateria, $attrezzi_cucina, $richiede_ce, $richiede_age, $richiede_cites;

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

    public function mount($id)
    {
        $this->ordine_id = $id;

    }

    public function articoloSelezionato($articoloId){
        $this->articolo_id = $articoloId;
        $this->selezionato = $articoloId;

        $articolo = FatturaData::where('id',$this->articolo_id)->get()->first();
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
        }
    }

    public function gruppoSelezionato($id)
    {
        $leggi_valori = FatturaData::select('it_descrizione','voce_doganale')->where('id','=',$id)->first();
        $this->descrizione_it = $leggi_valori->it_descrizione;
        $this->voce_doganale = $leggi_valori->voce_doganale;
    }

    public function carica_fattura()
    {
        $text = '/home/angelo/Scrivania/fattura-tipo.xls';
        $process = new Process(["python3", "/home/angelo/laravel/container/resources/Python/main.py",$text,$this->ordine_id]);
        $process->run();
        while ($process->isRunning()) {
            // waiting for process to finish
        }
        #dd( $process->getOutput());
        $articoli = FatturaData::paginate(19, ['*'], 'gruppi');
        #SELECT it_descrizione, ANY_VALUE(id), ANY_VALUE(voce_doganale) FROM `fattura_data` GROUP BY it_descrizione
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->groupBy('it_descrizione')->paginate(19, ['*'], 'gruppi')->get()->all();
        dd($gruppi);
        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');

    }

    public function ritorna()
    {
        $id = $this->ordine_id;
        return redirect(route('genera.distinta', compact('id')));

    }

    public function modifica_fattura()
    {
        // dd('modifico la fattura');
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
            $articolo->save();
        }

    }

    public function cancella_fattura()
    {
        dd('cancella_fattura');
    }

    public function salva_distinta()
    {
        dd('salva distinta');
    }

    public function render()
    {
        $articoli = FatturaData::paginate(19, ['*'], 'articoli');
        #$gruppi = FatturaData::select('id', 'it_descrizione', 'voce_doganale')->groupBy('id', 'it_descrizione', 'voce_doganale')->paginate(19);
        $gruppi = FatturaData::select('it_descrizione', DB::raw('ANY_VALUE(id) AS id'), DB::raw('ANY_VALUE(voce_doganale) AS voce_doganale'))->groupBy('it_descrizione')->paginate(19, ['*'], 'gruppi'); #->get()->all();
        #dd($articoli, $gruppi);
        return view('livewire.importa-fattura-manuale', compact('articoli','gruppi'))->layout('layouts.guest');
    }
}
