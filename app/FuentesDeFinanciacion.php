<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuentesDeFinanciacion extends Model
{
    protected $table = "pre_fuentes_de_financiaciones";
    protected $fillable = ['codigo', 'descripcion'];
}
