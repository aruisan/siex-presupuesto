<?php

namespace App\Http\Controllers;
use App\Cpc;
use App\BPin;

use App\User;
use App\Sector;
use App\Tercero;

//clases del select
use App\Vigencia;
use Carbon\Carbon;
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
use App\Traits\FileTraits;
use App\SeccionPresupuestal;
use Illuminate\Http\Request;
use App\FuentesDeFinanciacion;
use App\Imports\DependenciaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\SeccionPresupuestalAdicional;
use Illuminate\Support\Facades\Session;


class VigenciaController extends Controller
{
    public function presupuesto(){

        $pucs = PucPresupuesto::all();
        $cpcs = Cpc::all();
        $fuentes = FuentesDeFinanciacion::all();
        $politicas = PoliticaPublica::all();
        $productos_mga = ProductoMga::all();
        $programas_mga = ProgramaMga::all();
        $detalles_sectoriales = DetalleSectorial::all();
        $seccion_presupuestales = SeccionPresupuestal::all();
        $seccion_presupuestales_adicionales = SeccionPresupuestalAdicional::all();
        $sectores = Sector::all();
        $situacion_fondos = SituacionDeFondos::all();
        $terceros = Tercero::all();
        $tipos_normas = TipoDeNorma::all();
        $vigencia_gastos = VigenciaGastos::all();
        $bpins = BPin::all();
        $dependencias = Dependencia::all();
        $vigencias = Vigencia::all();
        $añoactual = Carbon::now()->year;
        $vigencias = Vigencia::where('vigencia', '=', $añoactual)->get();

        return view('presupuesto.index', compact(
            'pucs', 'cpcs', 'fuentes', 'politicas','vigencias', 'productos_mga', 'programas_mga', 'detalles_sectoriales', 'seccion_presupuestales', 'seccion_presupuestales_adicionales', 'sectores',
            'situacion_fondos', 'terceros', 'tipos_normas', 'vigencia_gastos', 'bpins', 'dependencias'
        ));


    }




    public function importar(Request $request){

        $select = $request->select_tabla;
        if($request->hasFile('file_import')):
            if($select == 'cpcs'){
                Excel::import(new CpcImport, $request->file('file_import'));

            }elseif($select == 'secretarias'){
                Excel::import(new DependenciaImport, $request->file('file_import'));
            }
        endif;

        return back();
    }

    public function create(){

        return view('presupuesto.vigencia.create');
    }

    public function store(Request $request){

        $request->validate([
            'vigencia' => 'required',
            'presupuesto_inicial' => 'required',
            'n_decreto' => 'required',
            'tipo' => 'required',
            'fecha' => 'required'
        ]);




        $duple = Vigencia::where('tipo', $request->tipo)->where('vigencia', $request->vigencia)->get()->count();
        if($duple < 1){

            if($request->hasFile('file'))
                {
                    $file = new FileTraits;
                    $ruta = $file->File($request->file('file'), 'Presupuesto');
                }else{
                    $ruta = "";
                }

            $vigencia = new Vigencia;

            $vigencia->vigencia = $request->get('vigencia');
            $vigencia->presupuesto_inicial = $request->get('presupuesto_inicial');
            $vigencia->tipo = $request->get('tipo');
            $vigencia->n_decreto = $request->get('n_decreto');
            $vigencia->fecha= $request->get('fecha');
            $vigencia->ruta = $ruta;

            $vigencia->save();
            Session::flash('success','La Vigencia se ha creado exitosamente');
            return redirect()->route('presupuesto.historial', $vigencia->id);
        }else{
            Session::flash('error','La Vigencia no se puede duplicar');
            return back();
        }




    }

}
