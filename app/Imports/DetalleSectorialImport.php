<?php

namespace App\Imports;

use App\DetalleSectorial;
use Maatwebsite\Excel\Concerns\ToModel;

class DetalleSectorialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new DetalleSectorial([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'descripcion' => isset($row[1]) ? $row[1] : ''
            ]);
        endif;
    }
}
