<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class TipoDeNorma extends Model
{
    protected $table = "pre_tipo_de_normas";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
