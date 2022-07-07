<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = "pre_rubros";
    protected $fillable = ['valor',
        'detalle_sectorial_id', 'cpc_id', 'fuente_de_financiacion_id', 'politica_publica_id', 'producto_mga_id', 'programa_mga_id', 'seccion_presupuestal_id', 'pub_presupuesto_id',
        'seccion_presupuestal_adicional_id', 'sector_id', 'situacion_de_fondo_id', 'tercero_id', 'tipo_de_norma_id', 'vigencia_id', 'vigencia_gasto_id', 'dependencia_id'
    ];
    public function dependencia(){
        return $this->belongsTo(Dependencia::class);
    }

    public function detalle_sectorial(){
        return $this->belongsTo(DetalleSectorial::class, 'detalle_sectorial_id');
    }

    public function puc(){
        return $this->belongsTo(PucPresupuesto::class, 'pub_presupuesto_id');
    }

    public function cpc(){
        return $this->belongsTo(Cpc::class, 'cpc_id');
    }

    public function fuente_financiacion(){
        return $this->belongsTo(FuentesDeFinanciacion::class, 'fuente_de_financiacion_id');
    }

    public function politica_publica(){
        return $this->belongsTo(PoliticaPublica::class, 'politica_publica_id');
    }

    public function producto_mga(){
        return $this->belongsTo(ProductoMga::class, 'producto_mga_id');
    }

    public function programa_mga(){
        return $this->belongsTo(ProgramaMga::class, 'programa_mga_id');
    }

    public function seccion_presupuestal(){
        return $this->belongsTo(SeccionPresupuestal::class, 'seccion_presupuestal_id');
    }

    public function seccion_presupuestal_Adicional(){
        return $this->belongsTo(SeccionPresupuestalAdicional::class, 'seccion_presupuestal_adicional_id');
    }

    public function sector(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function situacion_de_fondos(){
        return $this->belongsTo(SituacionDeFondos::class, 'situacion_de_fondo_id');
    }

    public function terceros(){
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }

    public function tipo_de_norma(){
        return $this->belongsTo(TipoDeNorma::class, 'tipo_de_norma_id');
    }

    public function vigencia(){
        return $this->belongsTo(Vigencia::class, 'vigencia_id');
    }

    public function vigencia_gastos(){
        return $this->belongsTo(VigenciaGastos::class, 'vigencia_gasto_id');
    }
    public function cdps(){
        return $this->hasMany(Cdp::class, 'rubro_id');
    }



    public function getSumaCdpsAttribute(){
        return $this->cdps->sum('valor');
    }

    public function getSaldoAttribute(){
        return $this->valor -$this->suma_cdps;
    }

    public function solicitudes_cdps(){
        return $this->hasMany(SolicitudCdp::class);
    }

    public function getDisponibleAttribute(){
        if($this->solicitudes_cdps->count() > 0 ){
            return $this->valor - $this->colicitudes_cdps->sum('valor');
        }else{
            return $this->valor;
        }

    }
}
