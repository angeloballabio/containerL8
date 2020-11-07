<?php

namespace App\Imports;

use App\Models\Fattura;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class FatturaImport implements ToModel
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Fattura([
            'col1' => $row[0],
            'col2' => $row[1],
            'col3' => $row[2],
            'col4' => $row[3],
            'col5' => $row[4],
            'col6' => $row[5],
            'col7' => $row[6],
            'col8' => $row[7],
            'col9' => $row[8],
            'col10' => $row[9],
            'col11' => $row[10],
        ]);
    }
}
