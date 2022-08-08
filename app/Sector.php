<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = "pre_sectores";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
