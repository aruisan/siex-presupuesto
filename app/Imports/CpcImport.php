<?php

namespace App\Imports;

use App\Cpc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CpcImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Cpc([
            'codigo' => $row['codigo'],
            'clase' => $row['clase'],
            'seccion' => $row['seccion'],
            'division' => $row['division']
        ]);

    }
}
