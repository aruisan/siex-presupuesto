<?php

namespace App\Imports;

use App\DetalleSectorial;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DetalleSectorialImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DetalleSectorial([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);

    }
}
