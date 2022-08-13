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
use JetBrains\PhpStorm\Pure;

class VigenciaController extends Controller
{
    public function presupuesto($id){
        $vigencia_id = $id;
        $vigencia = Vigencia::find($id);
        $rubros = $vigencia->rubros;
        $opciones = true;
        if (count($rubros) > 0) {
            $opciones = false;
        }
        $cpcs = $vigencia->cpcs;
        $pucs = $vigencia->pucs;
        $fuentes = $vigencia->fuentes;
        $politicas = $vigencia->politicas;
        $productos_mga = $vigencia->productos_mga;
        $programas_mga = $vigencia->programas_mga;
        $detalles_sectoriales = $vigencia->detalles_sectoriales;
        $seccion_presupuestales = $vigencia->seccion_presupuestales;
        $seccion_presupuestales_adicionales = $vigencia->seccion_presupuestales_adicionales;
        $sectores = $vigencia->sectores;
        $situacion_fondos = $vigencia->situacion_fondos;
        $terceros = $vigencia->terceros;
        $tipos_normas = $vigencia->tipos_normas;
        $vigencia_gastos = $vigencia->vigencia_gastos;
        $bpins = $vigencia->bpins;
        $dependencias = $vigencia->dependencias;
        $vigencias = Vigencia::all();
        $añoactual = Carbon::now()->year;
        $vigencias = Vigencia::where('vigencia', '=', $añoactual)->get();



        return view('presupuesto.index', compact(
            'pucs', 'cpcs', 'fuentes', 'politicas','vigencias','vigencia_id','opciones','productos_mga', 'programas_mga', 'detalles_sectoriales', 'seccion_presupuestales', 'seccion_presupuestales_adicionales', 'sectores',
            'situacion_fondos', 'terceros', 'tipos_normas', 'vigencia_gastos', 'bpins', 'dependencias', 'vigencia'
        ));


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

    public function edit($id, $tipo){

        $puc = PucPresupuesto::find($id);
        $cpc = Cpc::find($id);
        $fuente = FuentesDeFinanciacion::find($id);
        $politica = PoliticaPublica::find($id);
        $producto_mga = ProductoMga::find($id);
        $programa_mga = ProgramaMga::find($id);
        $detalle_sectorial = DetalleSectorial::find($id);
        $seccion_presupuestal = SeccionPresupuestal::find($id);
        $seccion_presupuestal_adicional = SeccionPresupuestalAdicional::find($id);
        $sector = Sector::find($id);
        $situacion_fondo = SituacionDeFondos::find($id);
        $tercero = Tercero::find($id);
        $tipo_norma = TipoDeNorma::find($id);
        $bpin = BPin::find($id);
        $dependencia = Dependencia::find($id);

        return view('presupuesto.edit', compact('tipo','cpc','puc','fuente','politica','producto_mga','programa_mga','detalle_sectorial',
        'seccion_presupuestal','seccion_presupuestal_adicional','sector','situacion_fondo','tercero','tipo_norma','bpin','dependencia'));

    }
    public function update(Request $request, $id){



        // dd($vigencia_id);

        if($request->has('formPuc')){

            $puc = PucPresupuesto::find($id);
            $vigencia = $puc->vigencia;
            $vigencia_id = $vigencia->id;

            $puc = PucPresupuesto::find($id);
            $puc->categoria = $request->input('categoria');
            $puc->municipio = $request->input('municipio');
            $puc->save();
        }

        if($request->has('formCpc')){

            $cpc = Cpc::find($id);
            $vigencia = $cpc->vigencia;
            $vigencia_id = $vigencia->id;

            $cpc = Cpc::find($id);
            $cpc->codigo = $request->input('codigo');
            $cpc->clase = $request->input('clase');
            $cpc->seccion = $request->input('seccion');
            $cpc->division = $request->input('division');
            $cpc->save();
        }

        if($request->has('formFuente')){

            $fuente = FuentesDeFinanciacion::find($id);
            $vigencia = $fuente->vigencia;
            $vigencia_id = $vigencia->id;

            $fuente = FuentesDeFinanciacion::find($id);
            $fuente->codigo = $request->input('codigo');
            $fuente->descripcion = $request->input('descripcion');
            $fuente->save();
        }

        if($request->has('formPolitica')){

            $politica = PoliticaPublica::find($id);
            $vigencia = $politica->vigencia;
            $vigencia_id = $vigencia->id;

            $politica = PoliticaPublica::find($id);
            $politica->codigo = $request->input('codigo');
            $politica->descripcion = $request->input('descripcion');
            $politica->save();
        }

        if($request->has('formProducto')){

            $producto_mga = ProductoMga::find($id);
            $vigencia = $producto_mga->vigencia;
            $vigencia_id = $vigencia->id;

            $producto_mga = ProductoMga::find($id);
            $producto_mga->codigo = $request->input('codigo');
            $producto_mga->descripcion = $request->input('descripcion');
            $producto_mga->sector = $request->input('sector');
            $producto_mga->programa = $request->input('programa');
            $producto_mga->save();
        }

        if($request->has('formPrograma')){

            $programa_mga = ProgramaMga::find($id);
            $vigencia = $programa_mga->vigencia;
            $vigencia_id = $vigencia->id;

            $programa_mga = ProgramaMga::find($id);
            $programa_mga->codigo = $request->input('codigo');
            $programa_mga->descripcion = $request->input('descripcion');
            $programa_mga->sector = $request->input('sector');
            $programa_mga->save();
        }

        if($request->has('formDetalle')){

            $detalle_sectorial = DetalleSectorial::find($id);
            $vigencia = $detalle_sectorial->vigencia;
            $vigencia_id = $vigencia->id;

            $detalle_sectorial = DetalleSectorial::find($id);
            $detalle_sectorial->codigo = $request->input('codigo');
            $detalle_sectorial->descripcion = $request->input('descripcion');
            $detalle_sectorial->save();
        }

        if($request->has('formSeccion')){

            $seccion_p = SeccionPresupuestal::find($id);
            $vigencia = $seccion_p->vigencia;
            $vigencia_id = $vigencia->id;

            $seccion_presupuestale = SeccionPresupuestal::find($id);
            $seccion_presupuestale->codigo = $request->input('codigo');
            $seccion_presupuestale->descripcion = $request->input('descripcion');
            $seccion_presupuestale->save();
        }

        if($request->has('formSeccionA')){

            $seccion_p_a = SeccionPresupuestalAdicional::find($id);
            $vigencia = $seccion_p_a->vigencia;
            $vigencia_id = $vigencia->id;

            $seccion_presupuestale_adicional = SeccionPresupuestalAdicional::find($id);
            $seccion_presupuestale_adicional->codigo = $request->input('codigo');
            $seccion_presupuestale_adicional->descripcion = $request->input('descripcion');
            $seccion_presupuestale_adicional->save();
        }

        if($request->has('formSector')){

            $sector = Sector::find($id);
            $vigencia = $sector->vigencia;
            $vigencia_id = $vigencia->id;

            $Sector = Sector::find($id);
            $Sector->codigo = $request->input('codigo');
            $Sector->descripcion = $request->input('descripcion');
            $Sector->save();
        }

        if($request->has('formSituacionF')){

            $situacion = SituacionDeFondos::find($id);
            $vigencia = $situacion->vigencia;
            $vigencia_id = $vigencia->id;

            $situacion_fondo = SituacionDeFondos::find($id);
            $situacion_fondo->codigo = $request->input('codigo');
            $situacion_fondo->descripcion = $request->input('descripcion');
            $situacion_fondo->save();
        }

        if($request->has('formTercero')){

            $tercero = Tercero::find($id);
            $vigencia = $tercero->vigencia;
            $vigencia_id = $vigencia->id;

            $tercero = Tercero::find($id);
            $tercero->codigo = $request->input('codigo');
            $tercero->entidad = $request->input('entidad');
            $tercero->save();
        }

        if($request->has('formTipoN')){

            $tipo = TipoDeNorma::find($id);
            $vigencia = $tipo->vigencia;
            $vigencia_id = $vigencia->id;

            $tipo_norma = TipoDeNorma::find($id);
            $tipo_norma->codigo = $request->input('codigo');
            $tipo_norma->descripcion = $request->input('descripcion');
            $tipo_norma->save();
        }

        if($request->has('formVigenciaG')){

            $vigencia_g = VigenciaGastos::find($id);
            $vigencia = $vigencia_g->vigencia;
            $vigencia_id = $vigencia->id;

            $vigencia_gasto = VigenciaGastos::find($id);
            $vigencia_gasto->codigo = $request->input('codigo');
            $vigencia_gasto->descripcion = $request->input('descripcion');
            $vigencia_gasto->save();
        }

        if($request->has('formVigenciaG')){
            $vigencia_gasto = VigenciaGastos::find($id);
            // $vigencia_gasto->codigo = $request->input('codigo');
            $vigencia_gasto->descripcion = $request->input('descripcion');
            $vigencia_gasto->save();
        }

        if($request->has('formBpin')){

            $bpin = BPin::find($id);
            $vigencia = $bpin->vigencia;
            $vigencia_id = $vigencia->id;

            $Bpin = BPin::find($id);
            $Bpin->confinanciado = $request->input('confinanciado');
            $Bpin->entidad = $request->input('entidad');
            $Bpin->secretaria_id = $request->input('secretaria_id');
            $Bpin->cod_sector = $request->input('cod_sector');
            $Bpin->nombre_sector = $request->input('nombre_sector');
            $Bpin->cod_proyecto = $request->input('cod_proyecto');
            $Bpin->nombre_proyecto = $request->input('nombre_proyecto');
            $Bpin->actividad = $request->input('actividad');
            $Bpin->metas = $request->input('metas');
            $Bpin->cod_producto = $request->input('cod_producto');
            $Bpin->nombre_producto = $request->input('nombre_producto');
            $Bpin->cod_indicador = $request->input('cod_indicador');
            $Bpin->nombre_indicador = $request->input('nombre_indicador');
            $Bpin->propios = $request->input('propios');
            $Bpin->sgp = $request->input('sgp');
            $Bpin->total = $request->input('total');
            $Bpin->save();
        }

        if($request->has('formDependencia')){

            $depe = Dependencia::find($id);
            $vigencia = $depe->vigencia;
            $vigencia_id = $vigencia->id;

            $dependencia = Dependencia::find($id);
            $dependencia->code = $request->input('code');
            $dependencia->nombre = $request->input('nombre');
            $dependencia->encargado = $request->input('encargado');
            $dependencia->save();
        }

        return redirect()->route('presupuesto.historial', $vigencia_id)->with('update','Presupuesto Editado con Exito');

    }

    public function destroy($id){


        Cpc::destroy($id);
        PucPresupuesto::destroy($id);
        FuentesDeFinanciacion::destroy($id);
        PoliticaPublica::destroy($id);
        ProductoMga::destroy($id);
        ProgramaMga::destroy($id);
        DetalleSectorial::destroy($id);
        SeccionPresupuestal::destroy($id);
        SeccionPresupuestalAdicional::destroy($id);
        Sector::destroy($id);
        SituacionDeFondos::destroy($id);
        Tercero::destroy($id);
        TipoDeNorma::destroy($id);
        BPin::destroy($id);
        Dependencia::destroy($id);
        VigenciaGastos::destroy($id);


        return back();


    }



}
