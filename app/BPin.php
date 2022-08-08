<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class BPin extends Model
{
    protected $fillable = ['confinanciado', 'entidad', 'secretaria_id', 'dependencia', 'cod_sector', 'nombre_sector','cod_proyecto' ,'nombre_proyecto' ,'actividad'
    ,'metas' ,'cod_producto' ,'nombre_producto' ,'cod_indicador' ,'nombre_indicador' ,'propios' ,'sgp' ,'total','vigencia_id'];


    public function rubro(){
        return $this->belongsTo(Rubro::class, 'rubro_id');
    }

    public function secretaria(){
        return $this->belongsTo(Dependencia::class, 'secretaria_id');
    }

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
