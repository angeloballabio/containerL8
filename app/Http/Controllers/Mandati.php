<?php

namespace App\Http\Controllers;
use App\Models\Operazione;
use App\Models\Dogana;
use Carbon\Carbon;
use App\Models\Fornitore;
use App\Models\Destinatario;
use App\Models\Trasportatore;
use Codedge\Fpdf\Fpdf\Fpdf;

use Illuminate\Http\Request;

class Mandati extends Controller
{
    public $operazione_id;

    public function index($id)
    {
        $this->operazione_id = $id;
        $operazione = Operazione::where('id','=',$this->operazione_id)->get()->first();
        $dogana = Dogana::where('soprannome','=',$operazione->dogana_t1)->get()->first();
        $oggi = Carbon::parse($operazione->data_pratica)->format('d/m/Y');
        $fornitore = Fornitore::where('soprannome','=',$operazione->nome_fornitore)->get()->first();
        $dogana_arrivo = Dogana::where('soprannome','=',$operazione->dogana_sdoganamento)->get()->first();
        $destinatario = Destinatario::where('soprannome','=',$operazione->destinatario_obl)->get()->first();
        $trasportatore = Trasportatore::where('soprannome','=',$operazione->trasportatore)->get()->first();
        return view('mandati',compact('dogana','operazione','oggi', 'fornitore','dogana_arrivo','destinatario','trasportatore'));
    }

    public function stampaPdf($id)
    {

        $this->operazione_id = $id;
        $operazione = Operazione::where('id','=',$this->operazione_id)->get()->first();
        $dogana = Dogana::where('soprannome','=',$operazione->dogana_t1)->get()->first();
        $oggi = Carbon::parse($operazione->data_pratica)->format('d/m/Y');
        $fornitore = Fornitore::where('soprannome','=',$operazione->nome_fornitore)->get()->first();
        $dogana_arrivo = Dogana::where('soprannome','=',$operazione->dogana_sdoganamento)->get()->first();
        $destinatario = Destinatario::where('soprannome','=',$operazione->destinatario_obl)->get()->first();
        $trasportatore = Trasportatore::where('soprannome','=',$operazione->trasportatore)->get()->first();

        $pdf = new Fpdf();
        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $larghezza = $pdf->GetPageWidth();
        $l = $larghezza-20;
        $pdf->cell($l,10, 'Mandato operazione',0,1,'C');

        $pdf->SetXY(10,10);
        $pdf->Image("immagini/logo3.png",10,18,80,50,'PNG');
        $pdf->Text(10,73,'Il Doganalista');
        $pdf->SetFont('Arial','',10);
        $pdf->Text(10,78,'Via della speranza, 135, 20131 Milano');
        $pdf->Text(10,83,'Tel. 12345678, 2387645 r.a.');
        $pdf->Text(10,88,'Albo Spedizionieri CCIA Milano 12345 ');
        $pdf->Text(10,93,'P.I. 123456789012 ');
        $pdf->SetFont('Arial','B',16);
        $pdf->Text(150,63,'Spettagile ditta');
        $pdf->SetFont('Arial','',10);
        $pdf->Text(150,68,$dogana->nome);
        $pdf->Text(150,73,$dogana->indirizzo.', N.'.$dogana->numero);
        $pdf->Text(150,78,$dogana->cap.' '.$dogana->luogo.' '.$dogana->provincia);
        $pdf->SetFont('Arial','',12);
        $pdf->Text(10,102,'Milano :'. $oggi);
        $pdf->SetXY(10,102);
        $pdf->cell($l,10, 'Oggetto import da:'.$fornitore->stato,0,1,'C');
        $pdf->Text(10,117,'Pratica N. : '. $operazione->numero_pratica);
        $pdf->SetXY(10,117);
        $pdf->cell($l,10, 'In allegato documentazione per emissione T1 diretto al nostro magazzino presso:',0,1,'C');
        $pdf->SetXY(10,127);
        $pdf->SetFont('Arial','B',20);
        $pdf->cell($l,8, $dogana_arrivo->nome,0,1,'C');
        $pdf->cell($l,8, $dogana_arrivo->indirizzo .' '.$dogana_arrivo->numero,0,1,'C');
        $pdf->cell($l,8, $dogana_arrivo->cap .', '.$dogana_arrivo->luogo.', '.$dogana_arrivo->provincia,0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Text(10,156,'Merce destinata alla ditta:');
        $pdf->SetXY(10,158);
        $pdf->SetFont('Arial','B',20);
        $pdf->cell($l,8, $destinatario->nome,0,1,'C');
        $pdf->cell($l,8, $destinatario->indirizzo .' '.$destinatario->numero,0,1,'C');
        $pdf->cell($l,8, $destinatario->cap .', '.$destinatario->luogo.', '.$destinatario->provincia,0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Text(10,185,'Dati spedizione :');
        $pdf->SetXY(10,190);
        $pdf->SetFont('Arial','B',20);
        $pdf->cell($l,8, 'Container :'.$operazione->container_nr.', Sigillo :'.$operazione->sigillo,0,1,'C');
        $pdf->cell($l,8, $operazione->tipo_container .', '.$operazione->cartoni.' CRTS '.$operazione->lordo_obl.' KGS '.$operazione->cubatura.' CBM',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Text(10,221,'Documenti allegati : '.$operazione->allegati);
        $pdf->Text(10,229,'Trasportatore :  '.$trasportatore->nome);
        $pdf->Text(10,239,'Grazie e distinti saluti');
        $pdf->SetFont('Arial','',12);

        $pdf->Text(130,257,'Il Doganalista');
        $pdf->Text(130,263,'Via della speranza, 135, 20131 Milano');
        $pdf->Text(130,267,'Tel. 12345678, 2387645 r.a.');
        $pdf->Text(130,273,'Albo Spedizionieri CCIA Milano 12345');
        $pdf->Text(130,277,'P.I. 123456789012');

        $pdf->Image("immagini/firma1.png",135,235,60,50,'PNG');


        $pdf->Output();
        exit;
    }

}
