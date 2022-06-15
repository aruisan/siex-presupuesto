<?php

namespace App\Imports;

use App\SeccionPresupuestalAdicional;
use Maatwebsite\Excel\Concerns\ToModel;

class SeccionPresupuestalAdicionalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new SeccionPresupuestalAdicional([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'descripcion' => isset($row[1]) ? $row[1] : ''
            ]);
        endif;
    }
}