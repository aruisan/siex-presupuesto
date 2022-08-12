<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class SituacionDeFondos extends Model
{
    protected $table = "pre_situacion_de_fondos";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
