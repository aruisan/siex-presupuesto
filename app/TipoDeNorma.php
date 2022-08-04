<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeNorma extends Model
{
    protected $table = "pre_tipo_de_normas";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];
}
