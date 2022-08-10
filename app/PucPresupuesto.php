<?php

namespace App;

use App\Rubro;
use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class PucPresupuesto extends Model
{
    protected $fillable = ['codigo', 'categoria', 'municipio','vigencia_id','rubro_id'];
    protected $table = "pre_puc_presupuestos";


    public function hijos(){
        return $this->hasMany(PucPresupuesto::class, 'padre_id');
    }

    public function padre(){
        return $this->belongsTo(PucPresupuesto::class, 'padre_id');
    }

    public function getCodeArrayAttribute(){
        return explode('.', $this->codigo);
    }

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }

    public function rubros(){
        return $this->hasMany(Rubro::class);
    }
}
