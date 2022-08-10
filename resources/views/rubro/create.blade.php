@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
            <div>
                <a class="btn float-right btn-primary " href="{{ route('rubro.index',$vigencia_id) }}">Rregresar</a>
            </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Rubro </div>
                <div class="card-body">
                   <form  method="post" action="{{route('rubro.store')}}">
                    @csrf
                    <input type="hidden" name="vigencia_id" value="{{ $vigencia_id }}">
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un Puc</label>
                            <select name="pub_presupuesto_id" class="form-control input_text col-sm-7 select2">
                                @foreach($pucs as $item)
                                    <option value="{{$item->id}}">* {{$item->categoria}} || {{$item->codigo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Valor del Rubro</label>
                            <input type="text" name="valor" class="form-control col-sm-7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un Cpc</label>
                            <select name="cpc_id" class="form-control input_text col-sm-7 select2">
                                @foreach($cpcs as $item)
                                    <option value="{{$item->id}}">{{$item->clase}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un Detalle Sectorial</label>
                            <select name="detalle_sectorial_id" class="form-control input_text col-sm-7 select2">
                                @foreach($detalles_sectoriales as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Fuente de Financiación</label>
                            <select name="fuente_de_financiacion_id" class="form-control input_text col-sm-7 select2">
                                @foreach($fuentes as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Politica Publica</label>
                            <select name="politica_publica_id" class="form-control input_text col-sm-7 select2">
                                @foreach($politicas as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un producto Mga</label>
                            <select name="producto_mga_id" class="form-control input_text col-sm-7 select2">
                                @foreach($productos_mga as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un programa Mga</label>
                            <select name="programa_mga_id" class="form-control input_text col-sm-7 select2">
                                @foreach($programas_mga as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Sección Presupuestal</label>
                            <select name="seccion_presupuestal_id" class="form-control input_text col-sm-7 select2">
                                @foreach($secciones_presupuestales as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Sección Presupuestal Adicional</label>
                            <select name="seccion_presupuestal_adicional_id" class="form-control input_text col-sm-7 select2">
                                @foreach($secciones_presupuestales_adicionales as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un Sector</label>
                            <select name="sector_id" class="form-control input_text col-sm-7 select2">
                                @foreach($sectores as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Situacion de fondos</label>
                            <select name="situacion_de_fondo_id" class="form-control input_text col-sm-7 select2">
                                @foreach($situaciones_de_fondos as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un Tercero</label>
                            <select name="tercero_id" class="form-control input_text col-sm-7 select2">
                                @foreach($terceros as $item)
                                    <option value="{{$item->id}}">{{$item->entidad}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un Tipo de norma</label>
                            <select name="tipo_de_norma_id" class="form-control input_text col-sm-7 select2">
                                @foreach($tipos_de_normas as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Vigencia de Gastos</label>
                            <select name="vigencia_gasto_id" class="form-control input_text col-sm-7 select2">
                                @foreach($vigencias_gastos as $item)
                                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona una Dependencia</label>
                            <select name="dependencia_id" class="form-control input_text col-sm-7 select2">
                                @foreach($dependencias as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary" {{ $validate == false ? 'disabled' : '' }} >Guardar</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function(){
        select2();
    });


    const select2 = () => {
        $('.select2').select2({
            theme: "bootstrap"
        });
    }
    </script>
@endsection
