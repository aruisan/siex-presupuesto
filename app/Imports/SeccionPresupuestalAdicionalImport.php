<?php

namespace App\Imports;

use App\SeccionPresupuestalAdicional;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SeccionPresupuestalAdicionalImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new SeccionPresupuestalAdicional([
            'codigo' => $row['codigo'],
            'descripcion' => $row['descripcion']
        ]);
    }
}

