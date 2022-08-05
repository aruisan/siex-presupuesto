<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class SeccionPresupuestal extends Model
{
    protected $table = "pre_seccion_presupuestales";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
