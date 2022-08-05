<?php

namespace App;

use App\Cpc;
use App\BPin;
use App\Sector;
use App\Tercero;
use App\Dependencia;
use App\ProductoMga;
use App\ProgramaMga;
use App\TipoDeNorma;
use App\PucPresupuesto;
use App\VigenciaGastos;
use App\PoliticaPublica;
use App\DetalleSectorial;
use App\Imports\CpcImport;
use App\SituacionDeFondos;
use App\SeccionPresupuestal;
use App\FuentesDeFinanciacion;
use App\SeccionPresupuestalAdicional;
use Illuminate\Database\Eloquent\Model;

class Vigencia extends Model
{
    protected $table = "pre_vigencias";
    protected $filable = ['n_decreto','ruta','fecha','presupuesto_inicial','orwne_id'];

    public function cpcimport(){

        return $this->HasMany(CpcImport::class);

    }

    public function getTypeAttribute(){
        return $this->tipo ? 'Ingresos' : 'Egresos';
    }

    public function cpcs(){
        return $this->hasMany(Cpc::class);
    }

    public function pucs(){
        return $this->hasMany(PucPresupuesto::class);
    }

    public function fuentes(){
        return $this->hasMany(FuentesDeFinanciacion::class);
    }

    public function politicas(){
        return $this->hasMany(PoliticaPublica::class);
    }

    public function productos_mga(){
        return $this->hasMany(ProductoMga::class);
    }

    public function programas_mga(){
        return $this->hasMany(ProgramaMga::class);
    }

    public function detalles_sectoriales(){
        return $this->hasMany(DetalleSectorial::class);
    }

    public function seccion_presupuestales(){
        return $this->hasMany(SeccionPresupuestal::class);
    }

    public function seccion_presupuestales_adicionales(){
        return $this->hasMany(SeccionPresupuestalAdicional::class);
    }

    public function sectores(){
        return $this->hasMany(Sector::class);
    }

    public function situacion_fondos(){
        return $this->hasMany(SituacionDeFondos::class);
    }

    public function terceros(){
        return $this->hasMany(Tercero::class);
    }

    public function tipos_normas(){
        return $this->hasMany(TipoDeNorma::class);
    }

    public function vigencia_gastos(){
        return $this->hasMany(VigenciaGastos::class);
    }

    public function bpins(){
        return $this->hasMany(BPin::class);
    }

    public function dependencias(){
        return $this->hasMany(Dependencia::class);
    }

}
