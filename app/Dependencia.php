<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = ['code', 'nombre', 'encargado','vigencia_id'];
}
