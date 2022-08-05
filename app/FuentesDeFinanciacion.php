<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class FuentesDeFinanciacion extends Model
{
    protected $table = "pre_fuentes_de_financiaciones";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
