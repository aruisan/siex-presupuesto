<?php

namespace App\Imports;

use App\SeccionPresupuestal;
use Maatwebsite\Excel\Concerns\ToModel;

class SeccionPresupuestalImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function  __construct(string $vigencia) {
        $this->vigencia = $vigencia;
    }

    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new SeccionPresupuestal([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'descripcion' => isset($row[1]) ? $row[1] : '',
                'vigencia_id' => $this->vigencia
            ]);
        endif;
    }
}
