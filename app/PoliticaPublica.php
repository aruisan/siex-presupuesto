<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliticaPublica extends Model
{
    protected $table = "pre_politica_publicas";
    protected $fillable = ['codigo', 'descripcion'];
}

