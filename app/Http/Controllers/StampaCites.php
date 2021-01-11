<?php

namespace App\Http\Controllers;
use App\Models\Articoli;

use Illuminate\Http\Request;

class StampaCites extends Controller
{
    //
    public function stampa_cites($id){
        $articoli = Articoli::where('ordine_id', '=', $id)->where('richiede_cites', '=', 1)->get();
        if (!$articoli->isEmpty()) {
            return response()->file('documenti/cites.pdf');
        } else {
            session()->flash('message', 'Nessun articolo richiede il controllo CITES.');
            return redirect(route('genera.distinta',compact('id')));
        }
    }

}
