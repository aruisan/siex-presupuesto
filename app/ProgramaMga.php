<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class ProgramaMga extends Model
{
    protected $table = "pre_programa_mgas";
    protected $fillable = ['codigo', 'descripcion', 'sector', 'programa','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
