<?php

namespace App\Imports;

use App\SituacionDeFondos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SituacionDeFondosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new SituacionDeFondos([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);
    }
}
