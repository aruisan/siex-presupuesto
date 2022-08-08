<?php

namespace App\Http\Controllers;

use App\BPin;
use App\Rubro;
use Illuminate\Http\Request;

class BPinController extends Controller
{
    public function index(){
       $bpins =  BPin::all();
       return view('bpin.index', compact('bpins'));
    }

    public function store(Request $request){
        BPin::create($request->all());
        return redirect()->route('bpin.index');
    }

    public function create(){
        $rubros = Rubro::where('dependencia_id', auth()->user()->dependencia_id)->get();
        return view('bpin.create', compact('rubros'));
    }
}
