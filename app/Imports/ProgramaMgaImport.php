<?php

namespace App\Imports;

use App\ProgramaMga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramaMgaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new ProgramaMga([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion'],
            'sector' => $row['sector']
        ]);
    }
}
