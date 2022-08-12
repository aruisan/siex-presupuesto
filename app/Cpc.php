<?php

namespace App;

use App\Rubro;
use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Cpc extends Model
{
    protected $table = "pre_cpcs";
    protected $fillable = ['codigo', 'clase', 'seccion', 'division','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
    public function rubro(){
        return $this->hasOne(Rubro::class);
    }
}
