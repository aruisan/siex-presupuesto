<?php

namespace App\Http\Controllers;

use App\Cdp;
use App\BPin;
use App\Rubro;
use App\Dependencia;
use App\SolicitudCdp;
use Illuminate\Http\Request;

class CdpController extends Controller
{
    public function index(){
        $rubros = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get()->pluck('id')->toArray();
        $cdps = Cdp::whereIn('rubro_id', $rubros)->get();
        return view('cdp.index', compact('cdps'));
    }

    public function create(){
        $bpins = BPin::where('secretaria', auth()->user()->dependencia->nombre)->get();
        $dependencias = Dependencia::all();
        $rubros = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get();
        $rubros_json = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get()->map(function($e){
            return [
                "id"=> $e->id,
                "puc" => $e->puc,
                "cpc" => $e->cpc,
                "producto" => $e->producto_mga,
                'programa' => $e->programa_mga,
                'sector' => $e->sector,
                'valor' => $e->valor,
                'disponible' => $e->disponible
            ];
        });
        return view('cdp.create', compact('rubros', 'bpins', 'rubros_json', 'dependencias'));
    }

    public function store(Request $request){
        //dd($request->all());
        $solicitud_cdp = SolicitudCdp::create([
            'tipo_gasto' => $request->tipo_gasto,
            'bpin_code'  => $request->bpin_code,
            'catalogo_cpc' => $request->catalogo_cpc, 
            'plan_adquisiciones' => $request->adquisiciones, 
            'objeto' => $request->objeto, 
            'vigencia_id' => 1,
            'owner_id' => auth()->id()
        ]);

        foreach($request->rubro_id as $k => $rubro):
            $solicitud_cdp->cdps()->create([
                'bpin_id' => $request->bpin_id[$k],
                'rubro_id' => $rubro,
                'valor' => $request->valor_solicitar[$k]
            ]);
        endforeach;
        return redirect()->route('cdp.index');
    }

    public function autorizaciones(){
        $cdps = Cdp::all();
        return view('cdp.autorizaciones', compact('cdps'));
    }

    public function autorizar(Request $request){
        foreach($request->estado as $estado){
            $data = explode(',',$estado);
            $cdp = Cdp::find($data[0]);
            if(auth()->user()->cdp1 && $cdp->autorizar1 == 1){
                $cdp->autorizar1 = $data[1];
            }elseif(auth()->user()->cdp2 && $cdp->autorizar1 == 2 && $cdp->autorizar2 == 1){
                $cdp->autorizar2 =$data[1];
            }
            $cdp->save();
        }
        return back();
    }
}
