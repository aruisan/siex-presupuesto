<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VigenciaGastos extends Model
{
    protected $table = "pre_vigencia_gastos";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];


    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }

}
