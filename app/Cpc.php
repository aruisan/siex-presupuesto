<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpc extends Model
{
    protected $table = "pre_cpcs";
    protected $fillable = ['codigo', 'clase', 'seccion', 'division','vigencia_id'];
}
