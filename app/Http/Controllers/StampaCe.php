<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articoli;
use App\Models\Pezzi;
use App\Models\Operazione;
use App\Models\Fornitore;
use App\Models\Destinatario;
use Codedge\Fpdf\Fpdf\Fpdf;



class StampaCe extends Controller
{
    //
    public $foto_riferimento = 0;

    public function stampa_ce($id){
        $pdf = new Fpdf('P','mm','A4');
        $articoli = Articoli::where('ordine_id', '=', $id)->where('richiede_ce', '=', 1)->get();
        $operazione = Operazione::where('id', '=', $id)->first();
        $fornitore = Fornitore::where('soprannome', '=', $operazione->nome_fornitore)->first();
        $destinatario = Destinatario::where('soprannome', '=', $operazione->destinatario_obl)->first();
        if (!$articoli->isEmpty()) {
            foreach ($articoli as $articolo) {
                $pezzi = Pezzi::where('ordine_id', '=', $id)->where('articolo_id', '=', $articolo->id)->get();
                $this->foto_riferimento += 1;

                $pdf->SetLeftMargin(5);
                $pdf->SetRightMargin(5);
                $pdf->AddPage();
                $pdf->SetFont('Arial', '', 16);

                $pdf->Text(90, 45, 'Spettabile');
                $pdf->Text(90, 52, 'Spet. Agenzia delle Dogane e dei Monopoli');
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Text(5, 70, 'Oggetto :');
                $pdf->SetFont('Arial', '', 12);

                $pdf->SetXY(5, 100);
                $pdf->Multicell(190, 6, 'Dichiarazione di conformita CE');
                $pdf->Multicell(190, 6, '');
                foreach ($pezzi as $pezzo) {
                    $pdf->Multicell(190, 6, 'L\'articolo identificato con il codice : '.$pezzo->codice_articolo, 0,'C');
                    $pdf->Multicell(190, 6, '');
                }
                $pdf->Multicell(190, 6, 'Prodotto e fornito dalla ditta : '.$fornitore->nome.' locata in : '.$fornitore->indirizzo.' n. '.$fornitore->numero, ' '.$fornitore->stato);
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, 'Dichiarazione di conformita CE fornitaci sotto la sola responsabilita del produttore/fornitore');
                $pdf->Multicell(190, 6, 'Oggetto della dichiarazione il prodotto denominato "'.$articolo->descrizione_it.'" e mostrato nella fotografia a colori allegato : '.$this->foto_riferimento);
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, 'Che l\'oggetto in questione e\' conforme con le norme imposte dalla Comunita Europea');
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, 'Rispetta le norme indicate come dall\'allegato numero : doc.'.$this->foto_riferimento);
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, 'Come anche dalle indicazioni indicate nel certificato rilasciato dall\'ente preposto allegato : cert.'.$this->foto_riferimento);
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, 'Firmato a nome e per conto di:');
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, $destinatario->nome.' '.$destinatario->luogo);
                $pdf->Multicell(190, 6, '');
                $pdf->Multicell(190, 6, 'Il responsabile '.$destinatario->responsabile);

            }
            $pdf->Output('D','Richiesta_CE.pdf');
            exit;
        } else {
            session()->flash('message', 'Nessun articolo richiede la certificazione CE.');
            return redirect(route('genera.distinta',compact('id')));
        }
    }
}
