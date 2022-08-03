<?php

namespace App\Imports;

use App\PoliticaPublica;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PoliticaPublicaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
            return new PoliticaPublica([
                'codigo' => $row['codigo'],
                'descripcion' => $row['descripcion']
            ]);
    }
}
