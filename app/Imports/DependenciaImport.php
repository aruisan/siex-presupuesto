<?php

namespace App\Imports;

use App\Dependencia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DependenciaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dependencia([
            'code' => $row['code'],
            'nombre' => $row['nombre'],
            'encargado' => $row['encargado']
        ]);
}
}
