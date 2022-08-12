<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "pre_personas";
    protected $fillable = ['nombre', 'tipo_dc', 'num_dc', 'email', 'direccion', 'tipo', 'telefono', 'delcarante', 'ciudad', 'regimen'];
}
