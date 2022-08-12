<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Cdp extends Model
{
    protected $fillable = ['valor', 'rubro_id','vigencia_id'];
    protected $table = "pre_cdps";

        public function rubro(){
            return $this->belongsTo(Rubro::class, 'rubro_id');
        }

    public function getEstadoAttribute(){
        if($this->autorizar1 == 2 && $this->autorizar2 == 2){
            return 'Aprobado';
        }if($this->autorizar1 == 0 || $this->autorizar2 == 0){
            return 'Recahzado';
        }else{
            return 'En espera';
        }
    }

    public function vigencia(){
        return $this->belongsTo(Vigencia::class);
    }
}
