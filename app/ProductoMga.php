<?php

namespace App;

use App\Rubro;
use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class ProductoMga extends Model
{
    protected $table = "pre_producto_mgas";
    protected $fillable = ['codigo', 'descripcion', 'sector', 'programa','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }

    public function Rubro(){
        return $this->hasOne(Rubro::class);
    }
}
