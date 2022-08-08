<?php

namespace App\Http\Controllers;

use App\PucPresupuesto;
use Illuminate\Http\Request;

class PubController extends Controller
{
    public function padres(){
        $pucs = PucPresupuesto::all();
        foreach($pucs as $puc):
            if(count($puc->code_array) > 1):
                $code_array = $puc->code_array;
                array_pop($code_array);
                $codigo_padre = implode(".", $code_array);
                $puc_padre = PucPresupuesto::where('codigo', $codigo_padre)->first();
                if(is_null($puc_padre)):
                    print($puc->id.' --- '.$codigo_padre. '<br>');
                else:
                    print('<b>'.$puc->id.' ///// '. $puc_padre->id. '</b><br>');
                    $puc->padre_id = $puc_padre->id; 
                    $puc->save();
                endif;
            endif;
        endforeach;
    }
}
