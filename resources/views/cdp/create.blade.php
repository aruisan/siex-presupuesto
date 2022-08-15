@extends('layouts.app')

@section('styles')
    <style>
        table.table{
            margin-bottom:0px !important;
        }
    </style>  
@endsection
@section('content')
<div class="container">
    <form action="{{route('cdp.store')}}" method="post">
        @csrf
        <table class="table table-bordered">
            <tr>
                <td colspan="2" rowspan="2" style="vertical-align: middle">
                    <span>Fecha De Solicitud</span>
                </td>
                    <td>
                    <span>DIA</span>
                </td>
                    <td>
                    <span>MES</span>
                </td>
                    <td>
                    <span>AÑO</span>
                </td>
                <td>
                </td>
                    <td>
                    <span>Formulario</span>
                </td>
                    <td>
                    <span><b>SHP-001</b></span>
                </td>
                
            </tr>
                <tr>
                    <td>
                    <input type="text" name="day" class="form-control" readonly value="{{date('d')}}"> 
                </td>
                    <td>
                    <input type="text" name="month" class="form-control" readonly value="{{date('m')}}"> 
                </td>
                    <td>
                    <input type="text" name="age" class="form-control" readonly value="{{date('Y')}}"> 
                </td>
                <td>
                </td>
                    <td>
                    <span>Versión</span>
                </td>
                    <td>
                    <span><b>Web-01</b></span>
                </td>
            </tr>
            <tr>
                <td colspan="8" class="td-titulos table-success text-center">
                    <span class="text-center">
                        DEPENDENCIA
                    </span>
                </td>
            </tr>
                <tr>
                    <td colspan="2">
                    Seleccione la Secretaria
                </td>
                    <td colspan="3">
                    <input type="hidden" id="select_dependencia" class="" readonly value="{{auth()->user()->dependencia_id}}">
                    <input type="text"  class="form-control" readonly value="{{auth()->user()->dependencia->nombre}}">
                </td>
                <td>
                    Dependencia
                </td>
                    <td colspan="2" id="td_dependencia">
                    
                </td>
            </tr>
            <tr>
                    <td colspan="2">
                    Nombre del Responsable
                </td>
                    <td colspan="3" id="td_responsable">
                </td>
                <td>
                    Elaborado por
                </td>
                    <td colspan="2">
                    {{auth()->user()->name}}
                </td>
            </tr>
            <tr>
                <td colspan="8" class="td-titulos table-success text-center">
                    <span class="text-center">
                        PROYECTO
                    </span>
                </td>
            </tr>
                <tr>
                    <td colspan="2">
                    Seleccione el tipo de Gasto
                </td>
                    <td colspan="2">
                    <select name="tipo_gasto" class="form-control" id="tipo_gasto">
                        <option value="Funcionamiento">Funcionamiento</option>
                        <option value="Inversion">Inversion</option>
                        <option value="Deuda">Deuda</option>
                    </select>
                </td>
                <td>
                    BPin No. 
                </td>
                <td>
                    <select name="bpin_code" class="form-control modulo_bpin" id="select_bpin">
                        @foreach($bpins->unique('cod_proyecto') as $bpin)
                            <option value="{{$bpin->cod_proyecto}}">{{$bpin->cod_proyecto}}</option>
                        @endforeach()
                    </select>
                </td>
                <td>
                    <span class="modulo_bpin">
                        Vigencia
                    </span>
                </td>
                <td>
                    <span class="modulo_bpin">
                        2022
                    </span>
                </td>
            </tr>
                <tr class="modulo_bpin">
                    <td>
                    NOMBRE
                </td>
                    <td colspan="7" id="nombre_proyecto">
                </td>
            </tr>
                <tr class="modulo_bpin">
                    <td>
                    META
                </td>
                    <td colspan="7" id="meta">
                </td>
            </tr>
                <tr class="modulo_bpin">
                    <td>
                    NOMBRE
                </td>
                <td id="cod_indicador">
                </td>
                    <td colspan="6" id="nombre_indicador">
                </td>
            </tr>
        </table>
        <table class="table table-bordered" id="tabla-actividades">
        </table>
        <table class="table table-bordered">
            <tr>
                <td colspan="8" class="td-titulos table-success text-center">
                    <span class="text-center">
                        PRESUPUESTO
                    </span>
                </td>
            </tr>
        </table>
        <table class="table table-bordered mt-0" id="tabla-actividades-rubro">
        </table>
        <table class="table table-bordered">
                <tr>
                <td colspan="8" class="td-titulos table-success text-center">
                    <span class="text-center">
                        CATALOGO DE PRODUCTOS Y PLAN DE ADQUISICIONES
                    </span>
                </td>
            </tr>
                <tr class="text-center">
                <td>
                    Catalogo del producto cpc
                </td>
                <td colspan="3">
                    
                </td>
                <td colspan="4">
                    <input class="form-control" name="catalogo_cpc">
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    Plan de adquisiciones
                </td>
                <td colspan="3">
                    
                </td>
                <td colspan="4">
                    <input class="form-control" name="adquisiciones">
                </td>
            </tr>
                <tr>
                <td colspan="8" class="td-titulos table-success text-center">
                    <span class="text-center">
                        Aprobaciones
                    </span>
                </td>
            </tr>
            <tr class="text-center">
                <td>
                    Objeto
                </td>
                <td colspan="7">
                    <textarea name="objeto" rows=3  class="form-control"></textarea>
                </td>
            </tr>
        </table>
    <button class="btn btn-primary">Guardar</button>
    
</div>
@endsection

@section('scripts')
    <script>
        const secretarias = @json($dependencias);
        const bpins = @json($bpins);
        const rubros = @json($rubros_json);
        let bpin_seleccionado = {};
        let t_valor_solicitar = 0;
        let disponible = 0;
        let definitivo = 0;

        $(document).ready(function(){
            console.log('rubros', rubros)
            cambiar_secretaria();
            cambiar_bpins();
            tipo_gasto();
        });

        $('#tipo_gasto').on('change', function(){
            tipo_gasto()
        })
        
        $('#select_dependencia').on('change', function(){
            cambiar_secretaria();
        })

        $('#select_bpin').on('change', function(){
            cambiar_bpins();
        })

         $(document).on('keyup','.valor_solicitar', function () { 
             let input = document.getElementsByName('valor_solicitar[]');
             t_valor_solicitar = 0;
            for (let i = 0; i < input.length; i++) {
                let a = input[i].value == '' ? 0 : input[i].value;
                t_valor_solicitar = parseInt(t_valor_solicitar) + parseInt(a)
                console.log('d', t_valor_solicitar);
            }

            $('#valor_solicitar_total').html(`$${t_valor_solicitar}`);
        });


        const tipo_gasto = () => {
             let data =  $('#tipo_gasto').val();
             if(data == 'Funcionamiento'){
                $('.modulo_bpin , #tabla-actividades, #tabla-actividades-rubro').hide();
             }else{
                 $('.modulo_bpin , #tabla-actividades, #tabla-actividades-rubro').show();
             }
        }

        const cambiar_secretaria = () => {
            let secretaria_id = $('#select_dependencia').val();
            let secretaria = secretarias.find(e => e.id == secretaria_id);
            $('#td_dependencia').html(`<span>${secretaria.nombre}</span>`);
            $('#td_responsable').html(`<span>${secretaria.encargado}</span>`);
        }


        const cambiar_bpins = () => {
            let bpin_code = $('#select_bpin').val();
            let bpin = bpins.find(e => e.cod_proyecto == bpin_code);
            let bpins_select = bpins.filter(e => e.cod_proyecto == bpin_code)

            let t_propios = 0;
            let t_sgp = 0;
            let t_total = 0;
            $('#nombre_proyecto').html(bpin.nombre_proyecto);
            $('#meta').html(bpin.metas);
            $('#cod_indicador').html(bpin.cod_indicador);
            $('#nombre_indicador').html(bpin.nombre_indicador);
            $('#tabla-actividades, #tabla-actividades-rubro').empty();

            let tr_first = `<tr>
                <td colspan="4">
                ACTIVIDADES
                </td>
                <td>
                    PROPIOS
                </td>
                <td>
                    SGP
                </td>
                <td>
                    TOTAL
                </td>
            </tr> `;
            $('#tabla-actividades').append(tr_first);

            bpins_select.forEach(e => {
                let propios = e.propios == '' ? 0 : e.propios;
                let sgp = e.sgp == '' ? 0 : e.sgp;
                let total = parseInt(propios)+parseInt(sgp)
                t_propios = parseInt(t_propios) + parseInt(propios);
                t_sgp = parseInt(t_sgp) + parseInt(sgp);
                t_total = parseInt(t_total) + parseInt(total);
                let item = `<tr>
                    <td colspan="4">
                     ${e.actividad}
                    </td>
                    <td>
                       $${propios}
                    </td>
                    <td>
                       $${sgp}
                    </td>
                    <td>
                      $${total}
                    </td>
                </tr>`;

                $('#tabla-actividades').append(item);
            });

            let tr_first_rubro = `<tr>
                <td colspan="4">
                 RUBRO
                </td>
                <td>
                    ACTIVIDAD
                </td>
                <td>
                    DEFINITIVO
                </td>
                <td>
                    DISPONIBLE
                </td>
                <td>
                    VALOR SOLICITADO
                </td>
            </tr> `;
            $('#tabla-actividades-rubro').append(tr_first_rubro);
            
    console.log('bpins_sele', bpins_select);
            bpins_select.forEach((e,i) => {
                let item = `<tr>
                    <td colspan="4">
                       <input type="hidden" id="rubro_${i}" name="rubro_id[]"/>
                       <input type="hidden" value="${e.id}" name="bpin_id[]"/>
                       <input class="form-control input_rubro col-md-12" id="${i}"/>
                    </td>
                    <td>
                     ${e.actividad}
                    </td>
                    <td id="definitivo_${i}">
                       $0
                    </td>
                    <td id="disponible_${i}">
                      $0
                    </td>
                    <td>
                        <input class="form-control valor_solicitar" type="number" name="valor_solicitar[]">
                    </td>
                </tr>`;

                $('#tabla-actividades-rubro').append(item);
            });



            let tr_last = `<tr class="table-secondary">
                <td colspan="4">
                TOTAL PROYECTO
                </td>
                <td>
                  $${t_propios}
                </td>
                <td>
                  $${t_sgp}
                </td>
                <td>
                  $${t_total}
                </td>
            </tr> `;
            $('#tabla-actividades').append(tr_last);

            let tr_last_rubro = `<tr class="table-secondary">
                <td colspan="5">
                    TOTAL PRESUPUESTADO
                </td>
                <td id="total_definitivo">
                    $0
                </td>
                <td id="total_disponible">
                  $0
                </td>
                <td id="valor_solicitar_total">
                    $0
                </td>
            </tr> `;
            $('#tabla-actividades-rubro').append(tr_last_rubro);
        } 


        $(document).on('change', '.input_rubro', function(){
            
            let data_input = $(this).val();
            let id = $(this).attr('id');
            /*
            let array_input = val_input.split('.');
            let last_input = array_input.pop();
            let data_input = array_input.join('.');
            */
            let rubro = rubros.find(e => e.puc.codigo == data_input);

            console.log('ulti', data_input);
            console.log('rubr', rubro);
            definitivo = parseInt(definitivo) + parseInt(rubro.valor)
            disponible = parseInt(disponible) + parseInt(rubro.valor)

            $(`#rubro_${id}`).val(rubro.id);

            $(`#definitivo_${id}`).text(`$${rubro.valor}`);
            $(`#disponible_${id}`).text(`$${rubro.valor}`);

            $('#total_definitivo').html(`$${definitivo}`);
            $('#total_disponible').html(`$${disponible}`);
        })


    </script>
@endsection
