<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class PoliticaPublica extends Model
{
    protected $table = "pre_politica_publicas";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}

