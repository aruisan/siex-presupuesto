<?php

namespace App\Imports;

use App\Dependencia;
use Maatwebsite\Excel\Concerns\ToModel;

class DependenciaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new Dependencia([
                'code' => isset($row[0]) ? $row[0] : '',
                'nombre' => isset($row[1]) ? $row[1] : '',
                'encargado' => isset($row[2]) ? $row[2] : ''
            ]);
        endif;
    }
}
