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
        $fornitore = Fornitore::where('soprannome', '=', $operazione->nome_fornitore)->first();
        $destinatario = Destinatario::where('soprannome', '=', $operazione->destinatario_obl)->first();

        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('acciaio', '=', 1)->get();
        if( !$articoli->isEmpty()){
            $this->acciaio = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'acciaio');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,70,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->Multicell(190,6, 'Buongiorno');
            $pdf->Multicell(190,6, 'Il sottoscritto : '.$destinatario->responsabile);
            $pdf->Multicell(190,6, 'Amministratore unico della Societa\' : '.$destinatario->nome);
            $pdf->Multicell(190,6, 'con la presente dichiara che da conferma del Fabbricante, gli articoli indicati nella fattura sopra indicata sono costruiti in ACCIAIO che puo essere impiegato a contatto con gli alimenti.');
            $pdf->SetXY(10, 190);
            $pdf->Multicell(190,6, 'Si specifica la norma UNI EN 100088-1');
            $pdf->Multicell(190,6, 'Designazione numerica : 1,4325');
            $pdf->Multicell(190,6, 'Designazione ALFANUMERICA : X9CrNIs 18-9');
            $pdf->Multicell(190,6, 'Dlassificazione AISI : AISI 302-UNS S 30200');
            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('acciaio_inox', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->acciaio_inox = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'acciaio inox');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(11, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(180, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->Multicell(190,6, 'Buongiorno');
            $pdf->Multicell(190,6, 'Il sottoscritto : '.$destinatario->responsabile);
            $pdf->Multicell(190,6, 'Amministratore unico della Societa\' : '.$destinatario->nome);
            $pdf->Multicell(190,6, 'con la presente dichiara che da conferma del Fabbricante, gli articoli indicati nella fattura sopra indicata sono costruiti in ACCIAIO INOX che puo essere impiegato a contatto con gli alimenti.');
            $pdf->SetXY(10, 190);
            $pdf->Multicell(190,6, 'AISI conforme a D.M. 258 del 21/12/2010, e al regolamento E.C. 1935/2004');
            $pdf->Multicell(190,6, 'Si specifica la norma UNI EN 100088-1');
            $pdf->Multicell(190,6, 'Designazione numerica : 1,4325');
            $pdf->Multicell(190,6, 'Designazione ALFANUMERICA : X9CrNIs 18-9');
            $pdf->Multicell(190,6, 'Dlassificazione AISI : AISI 302-UNS S 30200');
            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('plastica', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->plastica = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'plastica');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->Multicell(190,6, 'Buongiorno');
            $pdf->Multicell(190,6, 'Il sottoscritto : '.$destinatario->responsabile);
            $pdf->Multicell(190,6, 'Amministratore unico della Societa\' : '.$destinatario->nome);
            $pdf->Multicell(190,6, 'con la presente dichiara che da conferma del Fabbricante, gli articoli indicati nella fattura sopra indicata sono costruiti in MATERIALE PLASTICO che puo essere impiegato a contatto con gli alimenti.');
            //$pdf->SetXY(10, 190);
            $pdf->Multicell(190,6, 'denominato PP PLASTIC');
            $pdf->Multicell(190,6, 'Reg.N° 1935/2004 e 284/2011');
            $pdf->Multicell(190,6, 'Reg. UE 10/2011');
            $pdf->Multicell(190,6, 'Conforme all\'Art.13 paragrafi 2-3 e 4');
            $pdf->Multicell(190,6, 'Conforme all\'Art. 14 paragrafi 2-3');
            $pdf->Multicell(190,6, 'Che non sono state utilizzate sostanze soggette a restrizioni nei prodotti alimentari');
            $pdf->Multicell(190,6, 'non rilasciamo ammine aromatiche in quantita\' rilevabili, non rilasciano melammine in misura superiore al limite imposto a migrazione di 15mg/kg, sono destinate a venire a contatto con i prodotti alimentari');
            $pdf->Multicell(190,6, 'Si specifica inoltre che la durata e la temperatura di trattamento a contatto con il prodotto alimentare e\' rispettivamente di 5 minuti a 20C. Non c\'e\' utilizzo di una barriera funzionale in un materiale o in oggetto multistrato');
            //$pdf->SetXY(10, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicita\' delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('legno', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->legno = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'legno');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('bambu', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->bambu = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'bambu');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('vetro', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->vetro = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'Vetro');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->Multicell(190,6, 'Buongiorno');
            $pdf->Multicell(190,6, 'Il sottoscritto : '.$destinatario->responsabile);
            $pdf->Multicell(190,6, 'Amministratore unico della Societa\' : '.$destinatario->nome);
            $pdf->Multicell(190,6, 'con la presente dichiara che da conferma del Fabbricante, gli articoli indicati nella fattura sopra indicata sono costruiti in VETRO che puo essere impiegato a contatto con gli alimenti.');
            //$pdf->SetXY(10, 190);
            $pdf->Multicell(190,6, 'D.M. 21/03/1973');
            $pdf->Multicell(190,6, 'conformita (CE) 1935/2004 REG. 2023/2004 ');

            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('ceramica', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->ceramica = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'ceramica');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->Multicell(190,6, 'Buongiorno');
            $pdf->Multicell(190,6, 'Il sottoscritto : '.$destinatario->responsabile);
            $pdf->Multicell(190,6, 'Amministratore unico della Societa\' : '.$destinatario->nome);
            $pdf->Multicell(190,6, 'con la presente dichiara che da conferma del Fabbricante, gli articoli indicati nella fattura sopra indicata sono costruiti in CERAMICA che puo essere impiegato a contatto con gli alimenti.');
            $pdf->SetXY(10, 190);
            $pdf->Multicell(190,6, 'Regolamento (CE) n.1935/2004, e degli articoli 15 e 17 dello stesso regolamento');
            $pdf->Multicell(190,6, 'DM 1/2/2007 che recepisce la direttiva 2005/31/CE');
            $pdf->Multicell(190,6, 'Gli articoli sono atti a venire a contatto con pietanze commestibili.');
            $pdf->Multicell(190,6, 'Durata e temperatura di trattamento a contatto con il prodotto alimentare e adatte a qualsiasi tipo di prodotto dai +5C ai +80C, testato a 70C per 2h e 40C per 24h.');
            $pdf->Multicell(190,6, 'l rapporto tra la superficie di contatto del prodotto alimentare e il volume utilizzato può oscillare da un valore inferiore al 10% fino a oltre il 50%');
            $pdf->Multicell(190,6, 'Dichiariamo che per i nostri prodotti NON si utilizza in alcun modo una barriera funzionale.');
            //$pdf->SetXY(10, 215);
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('carta', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->carta = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'carta');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->Multicell(190,6, 'Buongiorno');
            $pdf->Multicell(190,6, 'Il sottoscritto : '.$destinatario->responsabile);
            $pdf->Multicell(190,6, 'Amministratore unico della Societa\' : '.$destinatario->nome);
            $pdf->Multicell(190,6, 'con la presente dichiara che da conferma del Fabbricante, gli articoli indicati nella fattura sopra indicata sono costruiti in PASTA DI CARTA che puo essere impiegato a contatto con gli alimenti.');
            $pdf->SetXY(5, 190);
            $pdf->Multicell(190,6, 'prescrizioni indicate nei Reg.N° 1935/2004 .');
            $pdf->Multicell(190,6, 'Prodotto utilizzato ai soli fini alimentari');

            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, '-di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, '-di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, '-che l\'Amministrazione si riserva di controllare la veridicita\' delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, '-che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('pietra', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->pietra = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'pietra');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('posateria', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->posateria = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'posateria');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->SetXY(5, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        $articoli = Articoli::where('ordine_id', '=', $this->ordine_id)->where('attrezzi_cucina', '=', 1)->get();
        if(!$articoli->isEmpty())
        {
            $this->attrezzi_cucina = 1;
            $pdf->SetLeftMargin(5);
            $pdf->SetRightMargin(5);
            $pdf->AddPage();
            $pdf->SetFont('Arial','',16);
            $pdf->Text(5,20,'attrezzi da cucina');
            $pdf->Text(150,45, 'Spettabile');
            $pdf->Text(150,52, 'USMAF - Genova');
            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,60,'Oggetto :');
            $pdf->SetFont('Arial','',12);

            $pdf->SetXY(5, 74);
            $pdf->Multicell(190,6, 'Dichiarazione di conformita\' dei materiali e degli oggetti destinati a venire in contatto con i prodotti alimentari ');
            $pdf->SetXY(5, 90);
            $pdf->Multicell(190, 6, '- Fattura N :  '.$operazione->nr_fattura);
            $pdf->SetXY(5, 100);
            $pdf->Multicell(190, 6, '- Produttore merce :  '.$fornitore->nome.' - '.$fornitore->luogo.' - '.$fornitore->stato);
            $pdf->SetXY(5, 110);
            $pdf->Multicell(190, 6, '- Importatore merce :  '.$destinatario->nome.', '.$destinatario->indirizzo.', '.$destinatario->numero.', '.$destinatario->luogo.', P.IVA'.$destinatario->piva);
            // $pdf->SetXY(13, 120);
            $pdf->SetX(5);
            $pdf->Multicell(190, 6, '- Container N :  '.$operazione->container_nr);

            $pdf->SetFont('Arial','B',12);
            $pdf->Text(5,140,'Descrizione merce :');

            $y = 140;
            $pdf->SetFont('Arial','',12);
            $pdf->SetXY(5, $y);
            foreach($articoli as $articolo)
            {

                $pdf->Multicell(190, 6, $articolo->descrizione_it, 0, 'C');
                $y += 10;
                $pdf->Multicell(190, 6, 'Cartoni: '.$articolo->tot_colli.' Peso lordo kgs: '.$articolo->tot_lordo.' Peso netto kgs: '.$articolo->tot_netto, 0, 'C');
                $y += 10;
            }
            $pdf->SetXY(10, 215);
            $pdf->Multicell(190,6, 'Il sottoscritto '.$destinatario->responsabile.' e\' consapevole:');
            $pdf->Multicell(190,6, 'di essere penalmente sanzionabile se rilascia falsa dichiarazione (art. 76D.P.R.445/2000)');
            $pdf->Multicell(190,6, 'di decadere dai benefici conseguiti a seguito di un provvedimento adottato sulla base delle false  dichiarazioni (art.75 D.P.R. 445/2000)');
            $pdf->Multicell(190,6, 'che l\'Amministrazione si riserva di controllare la veridicità delle dichiarazioni rese (art.71 D.P.R. n. 445/2000)');
            $pdf->Multicell(190,6, 'che i dati forniti dal dichiarante saranno utilizzati solo ai fini del procedimento richiesto (D.L.vo n.196/2003).');
            $pdf->Multicell(190,6, '');
            $pdf->Multicell(190,6, $destinatario->luogo.' '.date('d-m-Y', strtotime($operazione->data_pratica)));

        }
        //dd($this->plastica);
        if($this->acciaio == 1 or $this->acciaio_inox == 1 or $this->vetro == 1 or $this->posateria == 1 or $this->strumenti_cucina == 1 or $this->plastica == 1 or $this->legno == 1 or $this->bambu == 1 or $this->ceramica == 1 or $this->carta == 1 or $this->pietra == 1)
        {
            $pdf->Output();
            exit;
        } else {
            $id = $this->ordine_id;
            session()->flash('message', 'Nessun articolo ha sanitari da stampare.');
            return redirect(route('genera.distinta',compact('id')));
        }


    }
}
