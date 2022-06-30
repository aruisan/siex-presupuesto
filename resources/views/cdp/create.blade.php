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
                <input type="text" name="dia" class="form-control"> 
            </td>
             <td>
                <input type="text" name="mes" class="form-control"> 
            </td>
             <td>
                <input type="text" name="age" class="form-control"> 
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
                <select name="dependencia" class="form-control" id="select_dependencia">
                    @foreach($dependencias as $dependencia)
                        <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                    @endforeach()
                </select>
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
               <select name="bpin" class="form-control" id="select_bpin">
                    @foreach($bpins->unique('cod_proyecto') as $bpin)
                        <option value="{{$bpin->id}}">{{$bpin->cod_proyecto}}</option>
                    @endforeach()
                </select>
            </td>
            <td>
               Vigencia
            </td>
            <td>
               2022
            </td>
        </tr>
         <tr>
             <td>
                NOMBRE
            </td>
             <td colspan="7" id="nombre_proyecto">
            </td>
        </tr>
         <tr>
             <td>
                META
            </td>
             <td colspan="7" id="meta">
            </td>
        </tr>
         <tr>
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
         <tr class="text-center table-secondary">
            <td colspan="2">
                CODIGO
            </td>
            <td colspan="3">
                NOMBRE RUBRO
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
        </tr>
    </table>
</div>
@endsection

@section('scripts')
    <script>
        const secretarias = @json($dependencias);
        const bpins = @json($bpins);
        const rubros = @json($rubros_json);
        let bpin_seleccionado = {};
        let t_valor_solicitar = 0;

        $(document).ready(function(){
            cambiar_secretaria();
            cambiar_bpins();
        });
        
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

        const cambiar_secretaria = () => {
            let secretaria_id = $('#select_dependencia').val();
            let secretaria = secretarias.find(e => e.id == secretaria_id);
            $('#td_dependencia').html(`<span>${secretaria.nombre}</span>`);
            $('#td_responsable').html(`<span>${secretaria.encargado}</span>`);
        }


        const cambiar_bpins = () => {
            let bpin_id = $('#select_bpin').val();
            let bpin = bpins.find(e => e.id == bpin_id);
            let bpins_select = bpins.filter(e => e.cod_proyecto == bpin.cod_proyecto)

            let t_propios = 0;
            let t_sgp = 0;
            let t_total = 0;
            $('#nombre_proyecto').html(bpin.nombre_proyecto);
            $('#meta').html(bpin.metas);
            $('#cod_indicador').html(bpin.cod_indicador);
            $('#nombre_indicador').html(bpin.nombre_indicador);
            $('#tabla-actividades').empty();

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
                <td>
                    VALOR A SOLICITAR
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
                    <td>
                        <input class="form-control valor_solicitar" type="number" name="valor_solicitar[]" max="${total}">
                    </td>
                </tr>`;

                $('#tabla-actividades').append(item);
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
                <td id="valor_solicitar_total">
                    $0
                </td>
            </tr> `;
            $('#tabla-actividades').append(tr_last);
        } 

    </script>
@endsection
