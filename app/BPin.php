<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPin extends Model
{
    protected $fillable = ['rubro_id', 'valor', 'codigo', 'proyecto'];


    public function rubro(){
        return $this->belongsTo(Rubro::class, 'rubro_id');
    }
}
