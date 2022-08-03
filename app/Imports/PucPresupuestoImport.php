<?php

namespace App\Imports;

use App\PucPresupuesto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PucPresupuestoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            return new PucPresupuesto([
                'codigo' => $row['codigo'],
                'categoria' => $row['categoria'],
                'municipio' => $row['municipio']
            ]);
    }
}
