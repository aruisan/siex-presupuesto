<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = "pre_sectores";
    protected $fillable = ['codigo', 'descripcion'];
}
