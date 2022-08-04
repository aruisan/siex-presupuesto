<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSectorial extends Model
{
    protected $table = "pre_detalle_sectoriales";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];
}
