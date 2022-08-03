<?php

namespace App\Imports;

use App\FuentesDeFinanciacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FuentesDeFinanciacionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FuentesDeFinanciacion([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);
}
}
