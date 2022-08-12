<?php

namespace App\Imports;

use App\BPin;
use Maatwebsite\Excel\Concerns\ToModel;

class BPinImport implements ToModel
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
            return new BPin([
                'confinanciado' => isset($row[0]) ? $row[0] : '',
                'entidad' => isset($row[1]) ? $row[1] : '',
                'secretaria_id' => isset($row[2]) ? $row[2] : '',
                'cod_sector' => isset($row[3]) ? $row[3] : '',
                'nombre_sector' => isset($row[4]) ? $row[4] : '',
                'cod_proyecto' => isset($row[5]) ? $row[5] : '',
                'nombre_proyecto' => isset($row[6]) ? $row[6] : '',
                'metas' => isset($row[7]) ? $row[7] : '',
                'actividad' => isset($row[8]) ? $row[8] : '',
                'propios' => isset($row[9]) ? $row[9] : '',
                'sgp' => isset($row[10]) ? $row[10] : '',
                'total' => isset($row[11]) ? $row[11] : '',
                'cod_producto' => isset($row[12]) ? $row[12] : '',
                'nombre_producto' => isset($row[13]) ? $row[13] : '',
                'cod_indicador' => isset($row[14]) ? $row[14] : '',
                'nombre_indicador' => isset($row[15]) ? $row[15] : '',
                'vigencia_id' => $this->vigencia
            ]);
        endif;
    }
}
