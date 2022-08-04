<?php

namespace App\Imports;

use App\PucPresupuesto;
use Maatwebsite\Excel\Concerns\ToModel;

class PucPresupuestoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

<<<<<<< HEAD
    public function model(array $row, $vigencia_id)
=======
    public function  __construct(string $vigencia) {
        $this->vigencia = $vigencia;
    }

    public function model(array $row)
>>>>>>> efe1ffda340d5683f7b878834440b82a8ecbd99a
    {
        // \Log::debug($row);
        if(!is_null($row[0])):
            return new PucPresupuesto([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'categoria' => isset($row[1]) ? $row[1] : '',
                'municipio' => isset($row[2]) ? $row[2] : '',
                'vigencia_id' => $this->vigencia
            ]);
        endif;
    }
}
