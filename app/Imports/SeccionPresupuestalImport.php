<?php

namespace App\Imports;

use App\SeccionPresupuestal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SeccionPresupuestalImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new SeccionPresupuestal([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);
    }
}
