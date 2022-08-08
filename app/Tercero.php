<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    protected $table = "pre_terceros";
    protected $fillable = ['codigo', 'entidad','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
