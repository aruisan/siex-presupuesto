<?php

namespace App\Imports;

use App\BPin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BPinImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BPin([
            'cofinanciado' => $row['cofinanciado'],
            'entidad' => $row['entidad'],
            'secretaria_id' => $row['secretaria'],
            'cod_sector' => $row['cod._sector'],
            'nombre_sector' => $row['nombre_sector'],
            'cod_proyecto' => $row['cod._proyecto'],
            'nombre_proyecto' => $row['nombre_proyecto'],
            'metas' => $row['metas'],
            'actividad' => $row['actividad'],
            'propios' => $row['propios'],
            'sgp' => $row['sgp'],
            'total' => $row['total'],
            'cod_producto' => $row['cod._producto'],
            'nombre_producto' => $row['nombre_producto'],
            'cod_indicador' => $row['cod._indicador'],
            'nombre_indicador' => $row['nombre_indicador']
        ]);
    }
}
