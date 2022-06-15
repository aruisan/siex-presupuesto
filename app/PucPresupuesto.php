<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PucPresupuesto extends Model
{
    protected $fillable = ['codigo', 'categoria', 'municipio'];
    protected $table = "pre_puc_presupuestos";
}
