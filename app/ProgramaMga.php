<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaMga extends Model
{
    protected $table = "pre_programa_mgas";
    protected $fillable = ['codigo', 'descripcion', 'sector', 'programa','vigencia_id'];
}
