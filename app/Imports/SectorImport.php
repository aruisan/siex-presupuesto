<?php

namespace App\Imports;

use App\Sector;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SectorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
            return new Sector([
                'codigo' => $row['codigo'],
                'descripcion' => $row['descripcion']
            ]);
    }
}
