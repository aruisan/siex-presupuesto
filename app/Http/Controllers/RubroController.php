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

class RubroController extends Controller
{
    public function index(){
        $rubros = Rubro::all();
        return view('rubro.index', compact('rubros'));
    }

    public function create(){
        $cpcs = Cpc::all();
        $detalles_Sectorial = DetalleSectorial::all();
        $fuentes_de_financiacion = FuentesDeFinanciacion::all();
        $politicas_publicas = PoliticaPublica::all();
        $productos_mgas = ProductoMga::all();
        $programa_mgas = ProgramaMga::all();
        $pucs = PucPresupuesto::all();
        $secciones_presupuestales = SeccionPresupuestal::all();
        $secciones_presupuestales_adicionales = SeccionPresupuestalAdicional::all();
        $sectores = Sector::all();
        $situaciones_de_fondos = SituacionDeFondos::all();
        $terceros = Tercero::all();
        $tipos_de_normas = TipoDeNorma::all();
        $vigencias_gastos = VigenciaGastos::all(); 
        $dependencias = Dependencia::all();

        

        return view('rubro.create', compact('dependencias','cpcs' , 'detalles_Sectorial' , 'fuentes_de_financiacion' , 'politicas_publicas' , 'productos_mgas' ,
             'programa_mgas' , 'pucs' , 'secciones_presupuestales' , 'secciones_presupuestales_adicionales' , 'sectores' , 'situaciones_de_fondos' , 'terceros' , 'tipos_de_normas' , 'vigencias_gastos'));
    }

    public function store(Request $request){
        Rubro::create($request->all());
        return redirect()->route('rubro.index');
    }
}
