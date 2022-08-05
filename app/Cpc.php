<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Cpc extends Model
{
    protected $table = "pre_cpcs";
    protected $fillable = ['codigo', 'clase', 'seccion', 'division','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
