<?php

namespace App\Imports;

use App\Tercero;
use Maatwebsite\Excel\Concerns\ToModel;

class TerceroImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new Tercero([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'entidad' => isset($row[1]) ? $row[1] : ''
            ]);
        endif;
    }
}