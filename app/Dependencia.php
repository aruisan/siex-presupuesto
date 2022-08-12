<?php

namespace App;

use App\Rubro;
use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = ['code', 'nombre', 'encargado','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }

    public function Rubros(){
        return $this->hasOne(Rubro::class);
    }
}
