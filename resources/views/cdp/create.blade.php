@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Rubro </div>
                <div class="card-body">
                   <form  method="post" action="{{route('cdp.store')}}">
                    @csrf
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Fecha</label>
                            <input type="date" value="{{date('Y-m-d')}}" class="form-control col-sm-7" readonly >
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Secretaria Solicitante</label>
                            <input type="text"  class="form-control col-sm-7" value="{{auth()->user()->dependencia->nombre}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Nombre de Secretario</label>
                            <input type="text"  class="form-control col-sm-7" value="{{auth()->user()->name}}" readonly>
                        </div>
                    </div>
                    <hr class="mt-2 mb-5">
                    
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Clasificación de gastos</label>
                            <select id="clasificacion_gasto_select" name="clasificacion_gasto" class="form-control input_text col-sm-7">
                                <option value="Funcionamiento">Funcionamiento</option>
                                <option value="Inversion">Inversion</option>
                                <option value="Deuda">Deuda</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un BPin</label>
                            <select name="bpin_id" id="bpin_id" class="form-control input_text col-sm-7">
                                @foreach($bpins as $item)
                                    <option value="{{$item->id}}">{{$item->codigo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">Nombre del Proyecto</label>
                            <input type="text" class="form-control col-sm-7" id="nombre_proyecto">
                        </div>
                    </div>
                    <hr class="mt-2 mb-5">

                     <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">Actividad</label>
                            <input type="text" class="form-control col-sm-7" id="actividad">
                        </div>
                    </div>
                      <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">codigo del producto</label>
                            <input type="text" class="form-control col-sm-7" id="code_producto">
                        </div>
                    </div>
                      <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">producto</label>
                            <input type="text" class="form-control col-sm-7" id="producto">
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">Meta</label>
                            <input type="text" class="form-control col-sm-7" id="meta">
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">Cpc</label>
                            <input type="text" class="form-control col-sm-7" id="cpc">
                        </div>
                    </div>
                     <hr class="mt-2 mb-5">

                     <div class="row">
                        <div class="input-group my-2 col-md-12 bpin">
                            <label for="" class="input-group-text input_text_label col-sm-5">Rubro Presupuestal</label>
                            <input type="hidden" id="rubro_id" name="rubro_id">
                            <input type="text" class="form-control col-sm-7" id="rubro">
                        </div>
                    </div>

                     <div class="row">
                        <div class="input-group my-2 col-md-12 rubros">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un rubro</label>
                            <select name="rubro_id" class="form-control input_text col-sm-7">
                                @foreach($rubros as $item)
                                    <option value="{{$item->id}}">{{$item->puc->categoria}} - {{$item->puc->codigo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Valor Solicitado</label>
                            <input type="text" name="valor" class="form-control col-sm-7">
                        </div>
                    </div>

                     <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Objetivo</label>
                            <textarea class="form-control" name="objetivo"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
        const bpins = @json($bpins);
        const rubros = @json($rubros_json);
        let bpin_seleccionado = {};

        $(document).ready(function(){
            cambiar_bpins();
            cambiar_clasificacion_gasto();
        });
        

        $('#bpin_id').on('change', function(){
            cambiar_bpins();
        })

        $('#clasificacion_gasto').on('change', function(){
            cambiar_clasificacion_gasto();
        })

        const cambiar_clasificacion_gasto = () =>{
            let clasificacion_gasto = $('#clasificacion_gasto').val();
            if(clasificacion_gasto == 'Funcionamiento'){
                $('.bpin').hide();
                $('.rubros').show();
            }else{
                 $('.rubros').hide();
                $('.bpin').show();
            }
        }


        const cambiar_bpins = () => {
            let id = $('#bpin_id').val();
            
            bpin_seleccionado = bpins.find(e => e.id == id);
            console.log('id', bpin_seleccionado);
            cargar_data_bpin();
        } 

        const cargar_data_bpin = () => {
            let rubro = rubros.find(e => e.id = bpin_seleccionado.rubro_id)
            $('#nombre_proyecto').val(bpin_seleccionado.proyecto);

            $('#actividad').val('ambiental')
            $('#code_producto').val(rubro.producto.codigo)
            $('#producto').val(rubro.producto.descripcion)
            $('#cpc').val(rubro.cpc.clase)
            $('#rubro').val(rubro.puc.categoria)
            $('#rubro_id').val(rubro.id)
        }

    </script>
@endsection
