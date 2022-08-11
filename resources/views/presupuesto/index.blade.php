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
        </ul>@yield('hola')
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
                                <tr>
                                    <td>{{ $puc->codigo }}</td>
                                    <td>{{ $puc->categoria }}</td>
                                    <td>{{ $puc->municipio }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <button class="btn btn-success" onclick="modal_update_puc('{{ route('presupuesto.update', $puc->id) }}','{{$puc->categoria}}', '{{$puc->municipio}}')" ></button>
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$puc->id) }}" data-toggle="modal" data-target="#ModalEditPuc{{ $puc->id }}"><i class="fa fa-edit"></i>Editar</a>
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
                                <tr>
                                    <td>{{ $cpc->codigo }}</td>
                                    <td>{{ $cpc->clase }}</td>
                                    <td>{{ $cpc->seccion }}</td>
                                    <td>{{ $cpc->division }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <button class="btn btn-success" onclick="modal_update_cpc('{{ route('presupuesto.update', $cpc->id) }}','{{$cpc->codigo}}', '{{$cpc->clase}}', '{{$cpc->seccion}}', '{{$cpc->division}}')"></button>
                                        <a class="btn  btn-primary mr-2"   href="{{ route('presupuesto.edit',$cpc->id) }}" data-toggle="modal" data-target="#ModalEdit{{ $cpc->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$cpc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{-- Modal Cpc --}}
                                    {{-- Fin Modal Cpc --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>










        <div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       
                        <form action="" method="post" id="form_puc" class="form">
                            @method('PUT')
                            @csrf
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>categoria:</strong>
                                        <input type="text" name="categoria" class="form-control"  id="input_puc_categoria">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>municipio:</strong>
                                        <input type="text" name="municipio" class="form-control"  id="input_puc_municipio">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" name="formPuc" class="btn float-right btn-success">Editar</button>
                                </div>
                        </form>
                        <form action="" method="post" id="form_cpc" class="form">
                            @method('PUT')
                            @csrf
                            
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Codigo:</strong>
                                                    <input type="text" name="codigo" class="form-control"  id="input_cpc_codigo">
                                                </div>
                                            </div> 
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Clase:</strong>
                                                    <input type="text" name="clase" class="form-control" id="input_cpc_clase">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Seccion</strong>
                                                    <input type="text" name="seccion" class="form-control" id="input_cpc_seccion">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Division</strong>
                                                    <input type="text" name="division" class="form-control" id="input_cpc_division">
                                                </div>
                                            </div>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <button type="submit" name="formCpc" class="btn float-right btn-success">Editar</button>
                                            </div>
                                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
--}}
<script>
    const tablas = [
        'cpcs', 'pucs', 'fuente de financiacion', 'politica publica', 'producto mga', 'programa mga',
        'detalle sectorial', 'seccion presupuestal', 'seccion presupuestal adicional',
        'sector', 'situacion de fondo', 'tercero', 'tipo de norma', 'bpins', 'secretarias'
    ];
    $(document).ready(function() {
        select_load();
        select_change();
        hide_form()
    });

    const hide_form = () => {
        $('.form').hide();
    }

    const modal_update_puc = (route, categoria, municipio) =>{
        $('#ModalEdit').modal('show');
        hide_form();
        $(`#form_puc`).show().attr('action', route)
        $('#input_puc_categoria').val(categoria)
        $('#input_puc_municipio').val(municipio)
    }

    const modal_update_cpc = (route, codigo, clase, seccion, division) =>{
        $('#ModalEdit').modal('show');
        hide_form();
        $(`#form_cpc`).show().attr('action', route)
        $('#input_cpc_codigo').val(codigo)
        $('#input_cpc_clase').val(clase)
        $('#input_cpc_seccion').val(seccion)
        $('#input_cpc_division').val(division)
    }
    

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
