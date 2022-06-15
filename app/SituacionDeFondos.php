<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacionDeFondos extends Model
{
    protected $table = "pre_situacion_de_fondos";
    protected $fillable = ['codigo', 'descripcion'];
}
