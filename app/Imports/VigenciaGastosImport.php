<?php

namespace App\Imports;

use App\VigenciaGastos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VigenciaGastosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new VigenciaGastos([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);
    }
}
