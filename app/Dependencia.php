<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = ['code', 'nombre', 'encargado','vigencia_id'];

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
