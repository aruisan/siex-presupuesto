<?php

namespace App\Http\Controllers;

use App\Cdp;
use App\BPin;
use App\Rubro;
use Illuminate\Http\Request;

class CdpController extends Controller
{
    public function index(){
        $rubros = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get()->pluck('id')->toArray();
        $cdps = Cdp::whereIn('rubro_id', $rubros)->get();
        return view('cdp.index', compact('cdps'));
    }

    public function create(){
        $bpins = BPin::all();
        $rubros = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get();
        $rubros_json = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get()->map(function($e){
            return [
                "id"=> $e->id,
                "puc" => $e->puc,
                "cpc" => $e->cpc,
                "producto" => $e->producto_mga,
                'programa' => $e->programa_mga,
                'sector' => $e->sector,
                'vigencia_gastos' => $e->vigencia_gastos
            ];
        });
        return view('cdp.create', compact('rubros', 'bpins', 'rubros_json'));
    }

    public function store(Request $request){
        Cdp::create($request->all());
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
                $cdp->autorizar1 = $data[1] == 'aprobar' ? 2 : 0;
            }elseif(auth()->user()->cdp2 && $cdp->autorizar1 == 2 && $cdp->autorizar2 == 1){
                $cdp->autorizar2 =$data[1] == 'aprobar' ? 2 : 0;
            }
            $cdp->save();
        }
        return back();
    }
}
