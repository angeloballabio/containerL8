<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operazione;
use App\Models\Destinatario;
use App\Models\Articoli;
use App\Models\Pezzi;
use Codedge\Fpdf\Fpdf\Fpdf;

class StampaDistinta extends Controller
{
    public $ordine_id;
    public $totale_colli, $totale_pezzi, $totale_lordo, $totlae_netto, $totale_valore, $totale_diritti, $totale_iva;

    public function index($id)
    {
        $this->ordine_id = $id;
        $totale_colli = 0;
        $totale_pezzi = 0;
        $totale_lordo = 0;
        $totale_netto = 0;
        $totale_valore = 0;
        $totale_diritti = 0;
        $totale_iva = 0;

        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        $destino = $operazione->destinatario_obl;
        $destinatario = Destinatario::where('soprannome','=',$destino)->first();
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->get();
        foreach($articoli as $articolo)
        {
            $totale_colli = $totale_colli + $articolo->tot_colli;
            $totale_pezzi = $totale_pezzi + $articolo->tot_pezzi;
            $totale_lordo = $totale_lordo + $articolo->tot_lordo;
            $totale_netto = $totale_netto + $articolo->tot_netto;
            $totale_valore = $totale_valore + $articolo->tot_valore;
            $totale_diritti = $totale_diritti + $articolo->diritti_doganali;
            $totale_iva = $totale_iva + $articolo->val_iva;
        }
        $this->totale_colli = $totale_colli;
        $this->totale_pezzi = $totale_pezzi;
        $this->totale_lordo = $totale_lordo;
        $this->totale_netto = $totale_netto;
        $this->totale_valore = $totale_valore;
        $this->totale_diritti = $totale_diritti;
        $this->totale_iva = $totale_iva;

        return view('stampa_distinta',compact('operazione','articoli','destinatario','totale_colli', 'totale_pezzi', 'totale_lordo', 'totale_netto', 'totale_valore', 'totale_diritti', 'totale_iva'));
    }

    public function stampaPdf($id)
    {
        $this->ordine_id = $id;
        $totale_colli = 0;
        $totale_pezzi = 0;
        $totale_lordo = 0;
        $totale_netto = 0;
        $totale_valore = 0;
        $totale_diritti = 0;
        $totale_iva = 0;

        $operazione = Operazione::where('id', $this->ordine_id)->get()->first();
        $destino = $operazione->destinatario_obl;
        $destinatario = Destinatario::where('soprannome','=',$destino)->first();
        $articoli = Articoli::where('ordine_id','=',$this->ordine_id)->get();
        foreach($articoli as $articolo)
        {
            $totale_colli = $totale_colli + $articolo->tot_colli;
            $totale_pezzi = $totale_pezzi + $articolo->tot_pezzi;
            $totale_lordo = $totale_lordo + $articolo->tot_lordo;
            $totale_netto = $totale_netto + $articolo->tot_netto;
            $totale_valore = $totale_valore + $articolo->tot_valore;
            $totale_diritti = $totale_diritti + $articolo->diritti_doganali;
            $totale_iva = $totale_iva + $articolo->val_iva;
        }
        $this->totale_colli = $totale_colli;
        $this->totale_pezzi = $totale_pezzi;
        $this->totale_lordo = $totale_lordo;
        $this->totale_netto = $totale_netto;
        $this->totale_valore = $totale_valore;
        $this->totale_diritti = $totale_diritti;
        $this->totale_iva = $totale_iva;

        $pdf = new Fpdf('L','mm','A4');
        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        $pdf->Rect(10, 5, 60, 60);
        $pdf->Image("immagini/logo3.jpg", 10 , 5 , 60 , 30 , 'JPG');
        $pdf->SetFont('Arial','B',12);
        $pdf->Text(12,40,'Il Doganalista');
        $pdf->SetFont('Arial','',9);
        $pdf->Text(12,45,'Via della speranza, 135, 20131 Milano');
        $pdf->Text(12,50,'Tel. 12345678, 2387645 r.a.');
        $pdf->Text(12,55,'Albo Spedizionieri CCIA Milano 12345');
        $pdf->Text(12,60,'P.I. 123456789012');

        $pdf->Rect(100, 5, 60, 60);
        $pdf->Image("immagini/container1.png", 100 , 5 , 60 , 30 , 'PNG');
        $pdf->SetFont('Arial','B',12);
        $pdf->Text(102,40,'Dati spedizione');
        $pdf->SetFont('Arial','',9);
        $pdf->Text(102,45,'Container N. : '.$operazione->container_nr );
        $pdf->Text(102,50,'Fattura N.   : '.$operazione->nr_fattura);
        $pdf->Text(102,55,'Pratica N.   : '.$operazione->numero_pratica);
        $pdf->Text(102,60,'OBL N.       :'.$operazione->numero_obl);

        $pdf->Rect(200, 5, 90, 60);
        $pdf->Image("immagini/destinatario.jpg", 215 , 5 , 60 , 30 , 'JPG');
        $pdf->SetFont('Arial','B',12);
        $pdf->Text(202,40,'Destinatario');
        $pdf->SetFont('Arial','',9);
        $pdf->Text(202,45,'Ragione sociale : '.$destinatario->nome );
        $pdf->Text(202,50,'Indirizzo : '.$destinatario->indirizzo.','.$destinatario->numero);
        $pdf->Text(202,55,'Luogo: '.$destinatario->luogo );
        $pdf->Text(202,60,'P.I. : '.$destinatario->piva);
        $pdf->SetXY(10, 67);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(80, 6, 'Descrizione Uk', 'LTRB', 0, 'C');
        $pdf->Cell(80, 6, 'Descrizione It', 'LTRB', 0, 'C');
        $pdf->Cell(20, 6, 'Pezzi', 'LTRB', 0, 'C');
        $pdf->Cell(20, 6, 'Colli', 'LTRB', 0, 'C');
        $pdf->Cell(26, 6, 'Lordo kg', 'LTRB', 0, 'C');
        $pdf->Cell(26, 6, 'Netto kg', 'LTRB', 0, 'C');
        $pdf->Cell(27, 6, 'Valore :'.$operazione->valuta, 'LTRB', 0, 'C');
        $pdf->Ln(6);
        foreach($articoli as $articolo)
        {
            $pdf->Cell(80, 6, $articolo->descrizione_uk, 'LTRB', 0, 'L');
            $pdf->Cell(80, 6, $articolo->descrizione_it, 'LTRB', 0, 'L');
            $pdf->Cell(20, 6, $articolo->tot_pezzi, 'LTRB', 0, 'R');
            $pdf->Cell(20, 6, $articolo->tot_colli, 'LTRB', 0, 'R');
            $pdf->Cell(26, 6, $articolo->tot_lordo, 'LTRB', 0, 'R');
            $pdf->Cell(26, 6, $articolo->tot_netto, 'LTRB', 0, 'R');
            $pdf->Cell(27, 6, $articolo->tot_valore, 'LTRB', 0, 'R');
            $pdf->Ln(6);
        }
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(80, 6, '', '', 0, 'C');
        $pdf->Cell(80, 6, 'Totali :', '', 0, 'R');
        $pdf->Cell(20, 6, $this->totale_pezzi, 'LTRB', 0, 'R');
        $pdf->Cell(20, 6, $this->totale_colli, 'LTRB', 0, 'R');
        $pdf->Cell(26, 6, $this->totale_lordo, 'LTRB', 0, 'R');
        $pdf->Cell(26, 6, $this->totale_netto, 'LTRB', 0, 'R');
        $pdf->Cell(27, 6, $this->totale_valore, 'LTRB', 0, 'R');
        $pdf->Ln(6);
/* --------------------------------------------------------------------------------------------- */
        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        $pdf->Rect(10, 5, 60, 60);
        $pdf->Image("immagini/logo3.jpg", 10 , 5 , 60 , 30 , 'JPG');
        $pdf->SetFont('Arial','B',12);
        $pdf->Text(12,40,'Il Doganalista');
        $pdf->SetFont('Arial','',9);
        $pdf->Text(12,45,'Via della speranza, 135, 20131 Milano');
        $pdf->Text(12,50,'Tel. 12345678, 2387645 r.a.');
        $pdf->Text(12,55,'Albo Spedizionieri CCIA Milano 12345');
        $pdf->Text(12,60,'P.I. 123456789012');

        $pdf->SetFont('Arial','B',20);
        $pdf->Text(102,40,'Elenco tributi da versare');

        $pdf->SetXY(10, 67);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(80, 6, 'Descrizione It', 'LTRB', 0, 'C');
        $pdf->Cell(80, 6, 'Voce doganale', 'LTRB', 0, 'C');
        $pdf->Cell(30, 6, 'Diritti doganali', 'LTRB', 0, 'C');
        $pdf->Cell(20, 6, 'Iva %', 'LTRB', 0, 'C');
        $pdf->Cell(26, 6, 'Iva valore', 'LTRB', 0, 'C');
        $pdf->Ln(6);
        foreach($articoli as $articolo)
        {
            $pdf->Cell(80, 6, $articolo->descrizione_it, 'LTRB', 0, 'L');
            $pdf->Cell(80, 6, $articolo->voce_doganale, 'LTRB', 0, 'L');
            $pdf->Cell(30, 6, $articolo->diritti_doganali, 'LTRB', 0, 'R');
            $pdf->Cell(20, 6, $articolo->aliquota_iva, 'LTRB', 0, 'R');
            $pdf->Cell(26, 6, $articolo->val_iva, 'LTRB', 0, 'R');
            $pdf->Ln(6);
        }
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(80, 6, '', '', 0, 'C');
        $pdf->Cell(80, 6, 'Totali :', '', 0, 'R');
        $pdf->Cell(30, 6, $this->totale_diritti, 'LTRB', 0, 'R');
        $pdf->Cell(20, 6, '', 'LTRB', 0, 'R');
        $pdf->Cell(26, 6, $this->totale_iva, 'LTRB', 0, 'R');
        $pdf->Ln(6);


        $pdf->Output();
        exit;
    }
}
