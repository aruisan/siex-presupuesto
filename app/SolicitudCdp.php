<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudCdp extends Model
{
    protected $fillable = ['tipo_gasto', 'bpin_code', 'catalogo_cpc', 'plan_adquisiciones', 'objeto', 'vigencia_id' , 'owner_id'];


    public function cdps(){
        return $this->hasMany(Cdp::class, 'solicitud_cdp_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }
}

