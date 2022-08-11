<?php

namespace App;

use App\Rubro;
use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class DetalleSectorial extends Model
{
    protected $table = "pre_detalle_sectoriales";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }

    public function rubros(){
        return $this->hasOne(Rubro::class);
    }
}
