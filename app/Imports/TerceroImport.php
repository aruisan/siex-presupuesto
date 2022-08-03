<?php

namespace App\Imports;

use App\Tercero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TerceroImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Tercero([
            'codigo' => $row['codigo'],
            'entidad' => $row['entidad'],
        ]);
    }
}
