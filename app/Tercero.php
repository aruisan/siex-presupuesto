<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    protected $table = "pre_terceros";
    protected $fillable = ['codigo', 'entidad','vigencia_id'];
}
