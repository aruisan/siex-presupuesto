<?php

namespace App\Imports;

use App\ProductoMga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductoMgaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
            return new ProductoMga([
                'codigo' => $row['codigo'],
                'descripcion' => $row['descripcion'],
                'sector' => $row['sector'],
                'programa' => $row['programa']
            ]);
    }
}
