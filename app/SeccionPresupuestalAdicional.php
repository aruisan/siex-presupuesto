<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionPresupuestalAdicional extends Model
{
    protected $table = "pre_seccion_presupuestal_adicionales";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];
}
