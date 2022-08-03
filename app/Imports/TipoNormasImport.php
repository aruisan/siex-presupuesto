<?php

namespace App\Imports;

use App\TipoDeNorma;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TipoNormasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new TipoDeNorma([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);
    }
}
