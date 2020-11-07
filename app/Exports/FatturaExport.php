<?php

namespace App\Exports;

use App\Models\Fattura;
use Maatwebsite\Excel\Concerns\FromCollection;

class FatturaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fattura::all();
    }
}
