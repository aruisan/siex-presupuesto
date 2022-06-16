<?php

namespace App\Imports;

use App\Cpc;
use Maatwebsite\Excel\Concerns\ToModel;

class CpcImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new Cpc([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'clase' => isset($row[1]) ? $row[1] : '',
                'seccion' => isset($row[2]) ? $row[2] : '',
                'division' => isset($row[3]) ? $row[3] : ''
            ]);
        endif;
    }
}
