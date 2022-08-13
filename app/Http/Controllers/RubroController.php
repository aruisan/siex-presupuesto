<?php

namespace App\Http\Controllers;

use App\Cpc;
use App\Rubro;
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
use App\SituacionDeFondos;
use App\SeccionPresupuestal;
use Illuminate\Http\Request;
use App\FuentesDeFinanciacion;
use App\SeccionPresupuestalAdicional;
use App\Vigencia;

class RubroController extends Controller
{
    public function index($id){
        $vigencia = Vigencia::find($id);
        $rubros = Rubro::all();
        $pucs= PucPresupuesto::all();

        // dd($rubros);
        return view('rubro.index', compact('rubros','vigencia','pucs'));
    }

    public function create($id){
        $vigencia_id = $id;
        $vigencia = Vigencia::find($id);
        $cpcs = $vigencia->cpcs;
        $detalles_sectoriales = $vigencia->detalles_sectoriales;
        $fuentes = $vigencia->fuentes;
        $politicas = $vigencia->politicas;
        $productos_mga = $vigencia->productos_mga;
        $programas_mga = $vigencia->programas_mga;
        $pucs = $vigencia->pucs->filter(function($e){
           return  $e->hijos->count() == 0;
        });
        
        $secciones_presupuestales = $vigencia->seccion_presupuestales;
        $secciones_presupuestales_adicionales = $vigencia->seccion_presupuestales_adicionales;
        $sectores = $vigencia->sectores;
        $situaciones_de_fondos = $vigencia->situacion_fondos;
        $terceros = $vigencia->terceros;
        $tipos_de_normas = $vigencia->tipos_normas;
        $vigencias_gastos = $vigencia->vigencia_gastos;
        $dependencias = $vigencia->dependencias;

        $validate = true;
        if ($vigencia->cpcs->count() == 0) {
            $validate = false;
        }
        if ($vigencia->detalles_sectoriales->count() == 0) {
            $validate = false;
        }
        if ($vigencia->fuentes->count() == 0) {
            $validate = false;
        }
        if ($vigencia->politicas->count() == 0) {
            $validate = false;
        }
        if ($vigencia->productos_mga->count() == 0) {
            $validate = false;
        }
        if ($vigencia->programas_mga->count() == 0) {
            $validate = false;
        }
        if ($vigencia->pucs->count() == 0) {
            $validate = false;
        }
        if ($vigencia->seccion_presupuestales->count() == 0) {
            $validate = false;
        }
        if ($vigencia->seccion_presupuestales_adicionales->count() == 0) {
            $validate = false;
        }
        if ($vigencia->sectores->count() == 0) {
            $validate = false;
        }
        if ($vigencia->situacion_fondos->count() == 0) {
            $validate = false;
        }
        if ($vigencia->terceros->count() == 0) {
            $validate = false;
        }
        if ($vigencia->tipos_normas->count() == 0) {
            $validate = false;
        }
        // if ($vigencia->vigencia_gastos->count() == 0) {
        //     $validate = false;
        // }
        if ($vigencia->dependencias->count() == 0) {
            $validate = false;
        }

        // $pucs = PucPresupuesto::all()->filter(function($p){ return $p->id > 15260 && $p->hijos->count() == 0; });

        return view('rubro.create', compact('dependencias','vigencia_id','validate','cpcs' , 'detalles_sectoriales' , 'fuentes' , 'politicas' , 'productos_mga' ,
             'programas_mga' , 'pucs' , 'secciones_presupuestales' , 'secciones_presupuestales_adicionales' , 'sectores' , 'situaciones_de_fondos' , 'terceros' , 'tipos_de_normas' , 'vigencias_gastos'));
    }

    public function store(Request $request){

        Rubro::create($request->all());
        return redirect()->route('rubro.index', $request->vigencia_id);
    }

    public function destroy($id){
        Rubro::destroy($id);
        return back();

    }
}
