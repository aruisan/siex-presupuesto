<?php

namespace App;

use App\Imports\CpcImport;
use App\PucPresupuesto;
use Illuminate\Database\Eloquent\Model;

class Vigencia extends Model
{
    protected $table = "pre_vigencias";
    protected $filable = ['n_decreto','ruta','fecha','presupuesto_inicial','orwne_id'];

    public function cpcimport(){

        return $this->HasMany(CpcImport::class);

    }

}
