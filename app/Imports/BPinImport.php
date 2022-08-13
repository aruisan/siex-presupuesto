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
                'secretaria' => isset($row[2]) ? $row[2] : '',
                'dependencia' => isset($row[3]) ? $row[3] : '',
                'cod_sector' => isset($row[4]) ? $row[4] : '',
                'nombre_sector' => isset($row[5]) ? $row[5] : '',
                'cod_proyecto' => isset($row[6]) ? $row[6] : '',
                'nombre_proyecto' => isset($row[7]) ? $row[7] : '',
                'metas' => isset($row[8]) ? $row[8] : '',
                'cod_actividad' => isset($row[9]) ? $row[9] : '',
                'actividad' => isset($row[10]) ? $row[10] : '',
                'fecha_radicado' => isset($row[11]) ? date('Y-m-d', strtotime($row[11])) : '',
                'inicial' => isset($row[12]) ? $row[12] : '',
                'final' => isset($row[13]) ? $row[13] : '',
                'propios' => isset($row[14]) ? $row[14] : '',
                'sgp' => isset($row[15]) ? $row[15] : '',
                'cod_producto' => isset($row[16]) ? $row[16] : '',
                'nombre_producto' => isset($row[17]) ? $row[17] : '',
                'cod_indicador' => isset($row[18]) ? $row[18] : '',
                'nombre_indicador' => isset($row[19]) ? $row[19] : '',
                'vigencia_id' => $this->vigencia
            ]);
        endif;
    }
}
