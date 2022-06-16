<?php

namespace App\Http\Controllers;

use App\Imports\CpcImport;
use Illuminate\Http\Request;

use App\Imports\SectorImport;
use App\Imports\TerceroImport;
use App\Imports\TipoNormasImport;
use App\Imports\ProductoMgaImport;
use App\Imports\ProgramaMgaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PucPresupuestoImport;
use App\Imports\VigenciaGastosImport;
use App\Imports\PoliticaPublicaImport;
use App\Imports\DetalleSectorialImport;
use App\Imports\SituacionDeFondosImport;
use App\Imports\SeccionPresupuestalImport;
use App\Imports\FuentesDeFinanciacionImport;
use App\Imports\SeccionPresupuestalAdicionalImport;

class ImportarController extends Controller
{
    public function index(){
        return view('import.index');
    }

    public function importar(Request $request){
        if($request->hasFile('file_import')):
            //Excel::import(new PucPresupuestoImport, $request->file('file_import'));
            //Excel::import(new CpcImport, $request->file('file_import'));
            //Excel::import(new DetalleSectorialImport, $request->file('file_import'));
            //Excel::import(new FuentesDeFinanciacionImport, $request->file('file_import'));
            //Excel::import(new PoliticaPublicaImport, $request->file('file_import'));
            //Excel::import(new ProductoMgaImport, $request->file('file_import'));
            //Excel::import(new ProgramaMgaImport, $request->file('file_import'));
            /*
            Excel::import(new SeccionPresupuestalImport, $request->file('file_import'));
            Excel::import(new SeccionPresupuestalAdicionalImport, $request->file('file_import'));
            Excel::import(new SectorImport, $request->file('file_import'));
            Excel::import(new SituacionDeFondosImport, $request->file('file_import'));
            Excel::import(new TerceroImport, $request->file('file_import'));
            Excel::import(new TipoNormasImport, $request->file('file_import'));
            */ 
            Excel::import(new VigenciaGastosImport, $request->file('file_import'));
            /*
            */
        endif;

        return back();
    }
}
