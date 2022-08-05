<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class DetalleSectorial extends Model
{
    protected $table = "pre_detalle_sectoriales";
    protected $fillable = ['codigo', 'descripcion','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
