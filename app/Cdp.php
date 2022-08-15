<?php

namespace App;

use App\Vigencia;
use Illuminate\Database\Eloquent\Model;

class Cdp extends Model
{
    protected $fillable = ['valor', 'rubro_id','bpin_id', 'solicitud_id'];
    protected $table = "pre_cdps";

    public function rubro(){
        return $this->belongsTo(Rubro::class, 'rubro_id');
    }

    public function bpin(){
        return $this->belongsTo(BPin::class, 'bpin_id');
    }


    public function solicitud_cdp(){
        return $this->belongsTo(SolicitudCdp::class);
    }
}
