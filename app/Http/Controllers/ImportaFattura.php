<?php

namespace App\Http\Controllers;

use App\Models\Models\Fattura;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FatturaImport;
use App\Http\Controllers\Controller;

class ImportaFattura extends Controller
{

    public function importa()
    {
        Excel::import(new FatturaImport, '/home/angelo/Scrivania/fattura-tipo1.xlsx');

        return redirect('/operazioni')->with('success', 'All good!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Fattura  $fattura
     * @return \Illuminate\Http\Response
     */
    public function show(Fattura $fattura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Fattura  $fattura
     * @return \Illuminate\Http\Response
     */
    public function edit(Fattura $fattura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Fattura  $fattura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fattura $fattura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Fattura  $fattura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fattura $fattura)
    {
        //
    }
}
