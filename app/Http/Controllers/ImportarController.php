<?php

namespace App\Http\Controllers;

use App\Cpc;
use App\BPin;

use App\Sector;
use App\Tercero;
use App\Vigencia;
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
use App\Imports\BPinImport;
use App\SeccionPresupuestal;
use Illuminate\Http\Request;
use App\Imports\SectorImport;
use App\FuentesDeFinanciacion;
use App\Imports\TerceroImport;
use Illuminate\Support\Carbon;
use App\Exports\TemplateExport;
use App\Imports\TipoNormasImport;
use App\Imports\DependenciaImport;
use App\Imports\ProductoMgaImport;
use App\Imports\ProgramaMgaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PucPresupuestoImport;
use App\Imports\VigenciaGastosImport;
use App\SeccionPresupuestalAdicional;
use App\Imports\PoliticaPublicaImport;
use App\Imports\DetalleSectorialImport;
use App\Imports\SituacionDeFondosImport;
use App\Imports\SeccionPresupuestalImport;
use App\Imports\FuentesDeFinanciacionImport;
use App\Imports\SeccionPresupuestalAdicionalImport;

class ImportarController extends Controller
{
    public function index($id){
        // dd($id);
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


         return view('import.index', compact(
            'pucs', 'cpcs', 'fuentes', 'politicas','vigencias', 'productos_mga', 'programas_mga', 'detalles_sectoriales', 'seccion_presupuestales', 'seccion_presupuestales_adicionales', 'sectores',
            'situacion_fondos', 'terceros', 'tipos_normas', 'vigencia_gastos', 'bpins', 'dependencias'
         ));
    }

    public function importar(Request $request){

        $vigencia = $request->vigencia_id;
        $select = $request->select_tabla;

        if($request->hasFile('file_import')):
            if($select == 'cpcs'){
                Excel::import(new CpcImport($vigencia), $request->file('file_import'));
            }elseif($select == 'pucs'){
                Excel::import(new PucPresupuestoImport($vigencia), $request->file('file_import'));
            }elseif($select == 'fuente de financiacion'){
                Excel::import(new FuentesDeFinanciacionImport($vigencia), $request->file('file_import'));
            }elseif($select == 'politica publica'){
                Excel::import(new PoliticaPublicaImport($vigencia), $request->file('file_import'));
            }elseif($select == 'producto mga'){
                Excel::import(new ProductoMgaImport($vigencia), $request->file('file_import'));
            }elseif($select == 'programa mga'){
                Excel::import(new ProgramaMgaImport($vigencia), $request->file('file_import'));
            }elseif($select == 'detalle sectorial'){
                Excel::import(new DetalleSectorialImport($vigencia), $request->file('file_import'));
            }elseif($select == 'seccion presupuestal'){
                Excel::import(new SeccionPresupuestalImport($vigencia), $request->file('file_import'));
            }elseif($select == 'seccion presupuestal adicional'){
                Excel::import(new SeccionPresupuestalAdicionalImport($vigencia), $request->file('file_import'));
            }elseif($select == 'sector'){
                Excel::import(new SectorImport($vigencia), $request->file('file_import'));
            }elseif($select == 'situacion de fondo'){
                Excel::import(new SituacionDeFondosImport($vigencia), $request->file('file_import'));
            }elseif($select == 'tercero'){
                Excel::import(new TerceroImport($vigencia), $request->file('file_import'));
            }elseif($select == 'tipo de norma'){
                Excel::import(new TipoNormasImport($vigencia), $request->file('file_import'));
            }elseif($select == 'vigencia gastos'){
                Excel::import(new VigenciaGastosImport($vigencia), $request->file('file_import'));
            }elseif($select == 'bpins'){
                Excel::import(new BPinImport($vigencia), $request->file('file_import'));
            }elseif($select == 'secretarias'){
                Excel::import(new DependenciaImport($vigencia), $request->file('file_import'));
            }
        endif;

        return back();
    }

    public function exportar(Request $request){

        $select = $request->table_select;

        return Excel::download(new TemplateExport($select), 'template.xlsx');
    }
}
