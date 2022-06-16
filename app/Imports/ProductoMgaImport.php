<?php

namespace App\Imports;

use App\ProductoMga;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductoMgaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        if(!is_null($row[0])):
            return new ProductoMga([
                'codigo' => isset($row[0]) ? $row[0] : '',
                'descripcion' => isset($row[1]) ? $row[1] : '',
                'sector' => isset($row[2]) ? $row[2] : '',
                'programa' => isset($row[3]) ? $row[3] : ''
            ]);
        endif;
    }
}