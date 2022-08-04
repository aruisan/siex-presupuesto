<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoMga extends Model
{
    protected $table = "pre_producto_mgas";
    protected $fillable = ['codigo', 'descripcion', 'sector', 'programa','vigencia_id'];
}
