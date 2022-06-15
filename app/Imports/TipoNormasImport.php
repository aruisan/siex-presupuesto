<?php

namespace App\Imports;

use App\TipoDeNorma;
use Maatwebsite\Excel\Concerns\ToModel;

class TipoNormasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new TipoDeNorma([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'descripcion' => isset($row[1]) ? $row[1] : ''
            ]);
        endif;
    }
}