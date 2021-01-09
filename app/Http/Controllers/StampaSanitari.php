<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operazione;
use App\Models\Articoli;
use App\Models\Fornitore;
use App\Models\Destinatario;
use Codedge\Fpdf\Fpdf\Fpdf;

class StampaSanitari extends Controller
{
    //
    public $ordine_id;
    public $acciaio = 0, $acciaio_inox = 0, $vetro = 0, $posateria = 0, $strumenti_cucina = 0, $plastica = 0, $legno = 0, $bambu = 0, $ceramica = 0, $carta = 0, $pietra = 0;

    public function seleziona($id){
        $this->ordine_id = $id;

        $pdf = new Fpdf('P','mm','A4');
        $operazione = Operazione::where('id', '=', $this->ordine_id)->first();
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('acciaio', '=', 1)->get();
        $fornitore = Fornitore::where('soprannome', '=', $operazione->nome_fornitore)->first();
        $destinatario = Destinatario::where('soprannome', '=', $operazione->destinatario_obl)->first();

        if( !$articoli->isEmpty()){
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'acciaio');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,70,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('acciaio_inox', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'acciaio inox');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('plastica', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'plastica');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('legno', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'legno');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('bambu', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'bambu');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('vetro', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'Vetro');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('ceramica', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'ceramica');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('carta', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'carta');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('pietra', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'pietra');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('posateria', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(12,40,'posateria');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('attrezzi_cucina', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $pdf->SetLeftMargin(10);
            $pdf->SetRightMargin(10);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(1260,'attrezzi da cucina');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(13, 90);
            $pdf->Multicell(180, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(13, 100);
            $pdf->Multicell(180, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(13, 110);
            $pdf->Multicell(180, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(13);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(12,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(13, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(180, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(180, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }

        }
        $pdf->Output();
        exit;

    }
}
