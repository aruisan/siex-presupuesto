@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">importar excel </div>
                <div class="card-body">
                   <form id="formuilario" method="post"  enctype="multipart/form-data" action="{{route('importar.tablas')}}">
                    @csrf
                        <select name="select_tabla" id="select_tabla" class="form-control">
                        </select>
                        {{-- @foreach ($vigencias as $vigencia)
                        <input type="hidden" name="vigencia_id" value="{{$vigencia->id}}">
                        @endforeach --}}
                        <input class="form-control" name="file_import" type="file"/>
                        <button type="submit" class="btn btn-primary">Importar</button>
                   </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center row-table" id="row-pucs">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Categoria</th>
                        <th>Municipio</th>
                    </thead>
                    <tbody>
                    @foreach($pucs as $puc)
                        <tr>
                            <td>{{$puc->codigo}}</td>
                            <td>{{$puc->categoria}}</td>
                            <td>{{$puc->municipio}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-cpcs">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Clase</th>
                        <th>Sección</th>
                        <th>División</th>
                    </thead>
                    <tbody>
                    @foreach($cpcs as $cpc)
                        <tr>
                            <td>{{$cpc->codigo}}</td>
                            <td>{{$cpc->clase}}</td>
                            <td>{{$cpc->seccion}}</td>
                            <td>{{$cpc->division}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-fuente-de-financiacion">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                     <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($fuentes as $fuente)
                        <tr>
                            <td>{{$fuente->codigo}}</td>
                            <td>{{$fuente->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-politica-publica">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($politicas as $politica)
                        <tr>
                            <td>{{$politica->codigo}}</td>
                            <td>{{$politica->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-producto-mga">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Sector</th>
                        <th>Programa</th>
                    </thead>
                    <tbody>
                    @foreach($productos_mga as $producto_mga)
                        <tr>
                            <td>{{$producto_mga->codigo}}</td>
                            <td>{{$producto_mga->descripcion}}</td>
                            <td>{{$producto_mga->sector}}</td>
                            <td>{{$producto_mga->programa}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-programa-mga">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Sector</th>
                    </thead>
                    <tbody>
                    @foreach($programas_mga as $programa_mga)
                        <tr>
                            <td>{{$programa_mga->codigo}}</td>
                            <td>{{$programa_mga->descripcion}}</td>
                            <td>{{$programa_mga->sector}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-detalle-sectorial">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($detalles_sectoriales as $detalle_sectorial)
                        <tr>
                            <td>{{$detalle_sectorial->codigo}}</td>
                            <td>{{$detalle_sectorial->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-seccion-presupuestal">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($seccion_presupuestales as $seccion_presupuestal)
                        <tr>
                            <td>{{$seccion_presupuestal->codigo}}</td>
                            <td>{{$seccion_presupuestal->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-seccion-presupuestal-adicional">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($seccion_presupuestales_adicionales as $seccion_presupuestal_adicional)
                        <tr>
                            <td>{{$seccion_presupuestal_adicional->codigo}}</td>
                            <td>{{$seccion_presupuestal_adicional->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-sector">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($sectores as $sector)
                        <tr>
                            <td>{{$sector->codigo}}</td>
                            <td>{{$sector->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-sector">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($sectores as $sector)
                        <tr>
                            <td>{{$sector->codigo}}</td>
                            <td>{{$sector->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-situacion-de-fondo">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($situacion_fondos as $situacion_fondo)
                        <tr>
                            <td>{{$situacion_fondo->codigo}}</td>
                            <td>{{$situacion_fondo->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-tercero">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Entidad</th>
                    </thead>
                    <tbody>
                    @foreach($terceros as $tercero)
                        <tr>
                            <td>{{$tercero->codigo}}</td>
                            <td>{{$tercero->entidad}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <div class="row justify-content-center row-table" id="row-tipo-de-norma">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($tipos_normas as $tipo_norma)
                        <tr>
                            <td>{{$tipo_norma->codigo}}</td>
                            <td>{{$tipo_norma->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-vigencia-gastos">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Descripción</th>
                    </thead>
                    <tbody>
                    @foreach($vigencia_gastos as $vigencia_gasto)
                        <tr>
                            <td>{{$vigencia_gasto->codigo}}</td>
                            <td>{{$vigencia_gasto->descripcion}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-bpins">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Cofinanciado</th>
                        <th>Entidad</th>
                        <th>Secretaria</th>
                        <th>Cod. sector</th>
                        <th>Nombre sector</th>
                        <th>Cod. proyecto</th>
                        <th>Nombre proyecto</th>
                        <th>Actividad</th>
                        <th>Metas</th>
                        <th>Cod. producto</th>
                        <th>Nombre producto</th>
                        <th>Cod. indicador</th>
                        <th>Nombre indicador</th>
                        <th>Propios</th>
                        <th>SGP</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                    @foreach($bpins as $bpin)
                        <tr>
                            <td>{{$bpin->cofinanciado}}</td>
                            <td>{{$bpin->entidad}}</td>
                            <td>{{$bpin->secretaria->nombre}}</td>
                            <td>{{$bpin->cod_sector}}</td>
                            <td>{{$bpin->nombre_sector}}</td>
                            <td>{{$bpin->cod_proyecto}}</td>
                            <td>{{$bpin->nombre_proyecto}}</td>
                            <td>{{$bpin->actividad}}</td>
                            <td>{{$bpin->metas}}</td>
                            <td>{{$bpin->cod_producto}}</td>
                            <td>{{$bpin->nombre_producto}}</td>
                            <td>{{$bpin->cod_indicador}}</td>
                            <td>{{$bpin->nombre_indicador}}</td>
                            <td>{{$bpin->propios}}</td>
                            <td>{{$bpin->sgp}}</td>
                            <td>{{$bpin->total}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center row-table" id="row-secretarias">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Codigo</th>
                        <th>Secretaria</th>
                        <th>Encargado</th>
                    </thead>
                    <tbody>
                    @foreach($dependencias as $dependencia)
                        <tr>
                            <td>{{$dependencia->code}}</td>
                            <td>{{$dependencia->nombre}}</td>
                            <td>{{$dependencia->encargado}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const tablas = [
            'cpcs', 'pucs', 'fuente de financiacion', 'politica publica', 'producto mga', 'programa mga', 'detalle sectorial', 'seccion presupuestal', 'seccion presupuestal adicional',
             'sector', 'situacion de fondo', 'tercero', 'tipo de norma', 'vigencia gasto', 'bpins', 'secretarias'
        ];
        $(document).ready(function(){
            select_load();
            select_change();
            table();
        });

        $('#select_tabla').on('change', function(){
            select_change();
        })

        const select_change = () =>{
            $('.row-table').hide();
            let tabla = $('#select_tabla').val();
            let data = tabla.replace(/ /g, '-');
            $(`#row-${data}`).show();
        }

        const select_load = () => {
            tablas.forEach(e => {
                $('#select_tabla').append(`<option value="${e}">${e} Importar</option>`);
            });
        }

        const table = () =>{
            $('.table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        }


    </script>
@endsection
