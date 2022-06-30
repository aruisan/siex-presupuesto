<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPin extends Model
{
    protected $fillable = ['confinanciado', 'entidad', 'secretaria_id', 'dependencia', 'cod_sector', 'nombre_sector','cod_proyecto' ,'nombre_proyecto' ,'actividad' 
    ,'metas' ,'cod_producto' ,'nombre_producto' ,'cod_indicador' ,'nombre_indicador' ,'propios' ,'sgp' ,'total'];


    public function rubro(){
        return $this->belongsTo(Rubro::class, 'rubro_id');
    }
}
