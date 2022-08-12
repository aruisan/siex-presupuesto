@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (Session::has('update'))
            <div class="alert alert-info">
                {{ Session::get('update') }}
            </div>
        @else

        @endif
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="">Presupuestos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('rubro.index', $vigencia->id) }}">Rubros</a>
            </li>
        </ul>
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">importar excel </div>
                    <div class="card-body">
                        <form id="formuilario" method="post" enctype="multipart/form-data"
                            action="{{ route('importar.tablas') }}">
                            @csrf
                            <select name="select_tabla" id="select_tabla" class="form-control">
                            </select><br>
                            <input type="hidden" name="vigencia_id" value="{{ $vigencia_id }}">
                            <input class="form-control" name="file_import" type="file" /><br>
                            <div style="display: flex;justify-content: space-between;">
                                <button type="submit" class="btn btn-primary">Importar</button>
                            </div>
                        </form>
                        <form id="formuilario" method="post" enctype="multipart/form-data"
                            action="{{ route('exportar.tablas') }}">
                            @csrf
                            <input type="hidden" name="table_select" value="" id="exportar_table">
                            <div style="display: flex;justify-content: end">
                                <button type="submit" class="btn btn-primary">Template</button>
                            </div>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($pucs as $puc)
                                <tr class="ajuste-1">
                                    <td>{{ $puc->codigo }}</td>
                                    <td>{{ $puc->categoria }}</td>
                                    <td>{{ $puc->municipio }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$puc->id, 'puc']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$puc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($cpcs as $cpc)
                                <tr class="ajuste-1">
                                    <td>{{ $cpc->codigo }}</td>
                                    <td>{{ $cpc->clase }}</td>
                                    <td>{{ $cpc->seccion }}</td>
                                    <td>{{ $cpc->division }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn  btn-primary mr-2"   href="{{ route('presupuesto.edit',[$cpc->id, 'cpc']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$cpc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($fuentes as $fuente)
                                <tr class="ajuste-1">
                                    <td>{{ $fuente->codigo }}</td>
                                    <td>{{ $fuente->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$fuente->id, 'fuente']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$fuente->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($politicas as $politica)
                                <tr class="ajuste-1">
                                    <td>{{ $politica->codigo }}</td>
                                    <td>{{ $politica->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$politica->id, 'politica']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$politica->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($productos_mga as $producto_mga)
                                <tr class="ajuste-1">
                                    <td>{{ $producto_mga->codigo }}</td>
                                    <td>{{ $producto_mga->descripcion }}</td>
                                    <td>{{ $producto_mga->sector }}</td>
                                    <td>{{ $producto_mga->programa }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                       <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$producto_mga->id, 'producto_mga']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$producto_mga->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($programas_mga as $programa_mga)
                                <tr class="ajuste-1">
                                    <td>{{ $programa_mga->codigo }}</td>
                                    <td>{{ $programa_mga->descripcion }}</td>
                                    <td>{{ $programa_mga->sector }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$programa_mga->id, 'programa_mga']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$programa_mga->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($detalles_sectoriales as $detalle_sectorial)
                                <tr class="ajuste-1">
                                    <td>{{ $detalle_sectorial->codigo }}</td>
                                    <td>{{ $detalle_sectorial->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$detalle_sectorial->id, 'detalle_sectorial']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$detalle_sectorial->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($seccion_presupuestales as $seccion_presupuestal)
                                <tr class="ajuste-1">
                                    <td>{{ $seccion_presupuestal->codigo }}</td>
                                    <td>{{ $seccion_presupuestal->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$seccion_presupuestal->id, 'seccion_presupuestal']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$seccion_presupuestal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($seccion_presupuestales_adicionales as $seccion_presupuestal_adicional)
                                <tr class="ajuste-1">
                                    <td>{{ $seccion_presupuestal_adicional->codigo }}</td>
                                    <td>{{ $seccion_presupuestal_adicional->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$seccion_presupuestal_adicional->id, 'seccion_presupuestal_adicional']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$seccion_presupuestal_adicional->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($sectores as $sector)
                                <tr class="ajuste-1">
                                    <td>{{ $sector->codigo }}</td>
                                    <td>{{ $sector->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$sector->id, 'sector']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$sector->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($situacion_fondos as $situacion_fondo)
                                <tr class="ajuste-1">
                                    <td>{{ $situacion_fondo->codigo }}</td>
                                    <td>{{ $situacion_fondo->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$situacion_fondo->id, 'situacion_fondo']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$situacion_fondo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($terceros as $tercero)
                                <tr class="ajuste-1">
                                    <td>{{ $tercero->codigo }}</td>
                                    <td>{{ $tercero->entidad }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$tercero->id, 'tercero']) }}"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$tercero->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($tipos_normas as $tipo_norma)
                                <tr class="ajuste-1">
                                    <td>{{ $tipo_norma->codigo }}</td>
                                    <td>{{ $tipo_norma->descripcion }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$tipo_norma->id, 'tipo_norma']) }}"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$tipo_norma->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($bpins as $bpin)
                                <tr class="ajuste-1">
                                    <td>{{ $bpin->confinanciado }}</td>
                                    <td>{{ $bpin->entidad }}</td>
                                    <td>{{ $bpin->secretaria_id }}</td>
                                    <td>{{ $bpin->cod_sector }}</td>
                                    <td>{{ $bpin->nombre_sector }}</td>
                                    <td>{{ $bpin->cod_proyecto }}</td>
                                    <td>{{ $bpin->nombre_proyecto }}</td>
                                    <td>{{ $bpin->actividad }}</td>
                                    <td>{{ $bpin->metas }}</td>
                                    <td>{{ $bpin->cod_producto }}</td>
                                    <td>{{ $bpin->nombre_producto }}</td>
                                    <td>{{ $bpin->cod_indicador }}</td>
                                    <td>{{ $bpin->nombre_indicador }}</td>
                                    <td>{{ $bpin->propios }}</td>
                                    <td>{{ $bpin->sgp }}</td>
                                    <td>{{ $bpin->total }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$bpin->id, 'bpin']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$bpin->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($dependencias as $dependencia)
                                <tr class="ajuste-1">
                                    <td>{{ $dependencia->code }}</td>
                                    <td>{{ $dependencia->nombre }}</td>
                                    <td>{{ $dependencia->encargado }}</td>
                                    <td class="d-flex ajuste">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',[$dependencia->id, 'dependencia']) }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$dependencia->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script>
    const tablas = [
        'cpcs', 'pucs', 'fuente de financiacion', 'politica publica', 'producto mga', 'programa mga',
        'detalle sectorial', 'seccion presupuestal', 'seccion presupuestal adicional',
        'sector', 'situacion de fondo', 'tercero', 'tipo de norma', 'bpins', 'secretarias'
    ];
    $(document).ready(function() {
        select_load();
        select_change();
        table();
    });

    $('#select_tabla').on('change', function() {
        select_change();
    })

    const select_change = () => {
        $('.row-table').hide();
        let tabla = $('#select_tabla').val();
        $('#exportar_table').val(tabla);
        let data = tabla.replace(/ /g, '-');
        $(`#row-${data}`).show();
    }

    const select_load = () => {
        tablas.forEach(e => {
            $('#select_tabla').append(`<option value="${e}">${e} Importar</option>`);
        });
    }

    const table = () => {
        $('.table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    }

</script>

@endsection
