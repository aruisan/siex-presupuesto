<?php

namespace App\Imports;

use App\ProgramaMga;
use Maatwebsite\Excel\Concerns\ToModel;

class ProgramaMgaImport implements ToModel
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
            return new ProgramaMga([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'descripcion' => isset($row[1]) ? $row[1] : '',
                'sector' => isset($row[2]) ? $row[2] : '',
                'vigencia_id' => $this->vigencia
            ]);
        endif;
    }
}
