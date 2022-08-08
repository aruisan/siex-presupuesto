@extends('layouts.app')

@section('content')
<div class="col-md-12 align-self-center">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <br>

        <div class="form-validation">
            <form class="form-valide" action="{{route('vigencia.store')}}" method="POST" enctype="multipart/form-data">
                <br>
                <center><h2>Nueva Vigencia</h2></center>
                <hr>
                {{ csrf_field() }}
                <div class="form-group input-group my- col-md-12">
                    <label class="col-lg-4 col-form-label text-right" for="vigencia">Año de Vigencia <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="vigencia" min="2018" max="2100" value="{{ Carbon\Carbon::now()->year }}">
                        @error('vigencia')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group input-group my-2 col-md-12">
                    <label class="col-lg-4 col-form-label text-right" for="valor">Presupuesto Inicial <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" name="presupuesto_inicial">
                        @error('presupuesto_inicial')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group input-group my-2 col-md-12">
                    <label class="col-lg-4 col-form-label text-right" for="decreto">Número de Decreto <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="n_decreto">
                        @error('n_decreto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group input-group my-2 col-md-12">
                    <label class="col-lg-4 col-form-label text-right" for="decreto">Tipo de Vigencia <span class="text-danger">*</span></label>
                    <div class="form-check col-lg-2 ml-4 ">
                        <input class="form-check-input " type="radio" name="tipo" id="exampleRadios1" value="1">
                        <label class="form-check-label" for="exampleRadios1">
                        Ingresos
                        </label>
                    </div>
                    <div class="form-check col-lg-2">
                        <input class="form-check-input" type="radio" name="tipo" id="exampleRadios2" value="0">
                        <label class="form-check-label" for="exampleRadios2">
                        Egresos
                        </label>
                    </div>
                    @error('tipo')
                            <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group input-group my-2 col-md-12">
                    <label class="col-lg-4 col-form-label text-right" for="fechaDecreto">Fecha Decreto <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="fecha" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                        @error('fecha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group input-group my-2 col-md-12">
                    <label class="col-lg-4 col-form-label text-right" for="file">Anexar PDF</label>
                    <div class="col-lg-6 fallback">
                        <input name="file" class="form-control" type="file" class="form-control" accept="application/pdf" >
                    </div>
                </div>
                <div class="form-group input-group my-2 col-md-12">
                    <div class="col-lg-12 ml-auto mt-3 text-center">
                        <button type="submit" class="btn btn-success mr-5">Guardar</button>
                        <a href="/presupuesto" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
