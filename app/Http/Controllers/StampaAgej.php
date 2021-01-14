<?php

namespace App\Http\Controllers;
use App\Models\Articoli;

use Illuminate\Http\Request;

class StampaAgej extends Controller
{
    //
    public function stampa_age($id){
        $articoli = Articoli::where('ordine_id', '=', $id)->where('richiede_age', '=', 1)->get();
        //dd($articoli->count());
        if(!$articoli->isEmpty()){
            return response()->file('documenti/agej.pdf');
        } else {
            //$id = $this->ordine_id;
            session()->flash('message', 'Nessun articolo richiede il controllo Agecontrol.');
            return redirect(route('genera.distinta',compact('id')));
        }

    }
}
