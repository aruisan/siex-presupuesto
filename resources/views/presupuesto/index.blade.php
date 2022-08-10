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
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$puc->id) }}" data-toggle="modal" data-target="#ModalEditPuc{{ $puc->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$puc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{-- Modal Puc --}}
                                    <form action="{{ route('presupuesto.update', $puc->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditPuc{{ $puc->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit puc</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $puc->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>categoria:</strong>
                                                                <input type="text" name="categoria" class="form-control" value="{{ $puc->categoria }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>municipio:</strong>
                                                                <input type="text" name="municipio" class="form-control" value="{{ $puc->municipio }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formPuc" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Puc --}}
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
                                        <a class="btn  btn-primary mr-2"   href="{{ route('presupuesto.edit',$cpc->id) }}" data-toggle="modal" data-target="#ModalEdit{{ $cpc->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$cpc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{-- Modal Cpc --}}
                                    <form action="{{ route('presupuesto.update', $cpc->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEdit{{ $cpc->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit cpc</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $cpc->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Clase:</strong>
                                                                <input type="text" name="clase" class="form-control" value="{{ $cpc->clase }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Seccion</strong>
                                                                <input type="text" name="seccion" class="form-control" value="{{ $cpc->seccion }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Division</strong>
                                                                <input type="text" name="division" class="form-control" value="{{ $cpc->division }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formCpc" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Cpc --}}
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
                                <tr>
                                    <td>{{ $fuente->codigo }}</td>
                                    <td>{{ $fuente->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$fuente->id) }}" data-toggle="modal" data-target="#ModalEditFuente{{ $fuente->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$fuente->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>

                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Fuente --}}
                                    <form action="{{ route('presupuesto.update', $fuente->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditFuente{{ $fuente->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit fuente</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $fuente->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $fuente->descripcion }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formFuente" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Fuente --}}
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
                                <tr>
                                    <td>{{ $politica->codigo }}</td>
                                    <td>{{ $politica->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$politica->id) }}" data-toggle="modal" data-target="#ModalEditPolitica{{ $politica->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$politica->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Politica --}}
                                    <form action="{{ route('presupuesto.update', $politica->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditPolitica{{ $politica->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit politica</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $politica->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Clase:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $politica->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formPolitica" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Politica --}}
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
                                <tr>
                                    <td>{{ $producto_mga->codigo }}</td>
                                    <td>{{ $producto_mga->descripcion }}</td>
                                    <td>{{ $producto_mga->sector }}</td>
                                    <td>{{ $producto_mga->programa }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                       <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$producto_mga->id) }}" data-toggle="modal" data-target="#ModalEditProducto{{ $producto_mga->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$producto_mga->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Producto Mga --}}
                                    <form action="{{ route('presupuesto.update', $producto_mga->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditProducto{{ $producto_mga->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit producto_mga</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $producto_mga->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $producto_mga->descripcion }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Sector</strong>
                                                                <input type="text" name="sector" class="form-control" value="{{ $producto_mga->sector }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Programa</strong>
                                                                <input type="text" name="programa" class="form-control" value="{{ $producto_mga->programa }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formProducto" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Producto Mga --}}

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
                                <tr>
                                    <td>{{ $programa_mga->codigo }}</td>
                                    <td>{{ $programa_mga->descripcion }}</td>
                                    <td>{{ $programa_mga->sector }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$programa_mga->id) }}" data-toggle="modal" data-target="#ModalEditPrograma{{ $programa_mga->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$programa_mga->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{-- Modal Programa Mga --}}
                                    <form action="{{ route('presupuesto.update', $programa_mga->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditPrograma{{ $programa_mga->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit programa_mga</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $programa_mga->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $programa_mga->descripcion }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Sector</strong>
                                                                <input type="text" name="sector" class="form-control" value="{{ $programa_mga->sector }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formPrograma" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Programa Mga --}}
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
                                <tr>
                                    <td>{{ $detalle_sectorial->codigo }}</td>
                                    <td>{{ $detalle_sectorial->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$detalle_sectorial->id) }}" data-toggle="modal" data-target="#ModalEditDetalle{{ $detalle_sectorial->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$detalle_sectorial->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Detalle --}}
                                    <form action="{{ route('presupuesto.update', $detalle_sectorial->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditDetalle{{ $detalle_sectorial->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit detalle_sectorial</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $detalle_sectorial->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $detalle_sectorial->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formDetalle" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Detalle --}}
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
                                <tr>
                                    <td>{{ $seccion_presupuestal->codigo }}</td>
                                    <td>{{ $seccion_presupuestal->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$seccion_presupuestal->id) }}" data-toggle="modal" data-target="#ModalEditSeccion{{ $seccion_presupuestal->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$seccion_presupuestal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Seecion P --}}
                                    <form action="{{ route('presupuesto.update', $seccion_presupuestal->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditSeccion{{ $seccion_presupuestal->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit seccion_presupuestal</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $seccion_presupuestal->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $seccion_presupuestal->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formSeccion" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Seecion P --}}
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
                                <tr>
                                    <td>{{ $seccion_presupuestal_adicional->codigo }}</td>
                                    <td>{{ $seccion_presupuestal_adicional->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$seccion_presupuestal_adicional->id) }}" data-toggle="modal" data-target="#ModalEditSeccionA{{ $seccion_presupuestal_adicional->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$seccion_presupuestal_adicional->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Seccion P Adicional --}}
                                    <form action="{{ route('presupuesto.update', $seccion_presupuestal_adicional->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditSeccionA{{ $seccion_presupuestal_adicional->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit seccion_presupuestal_adicional</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $seccion_presupuestal_adicional->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $seccion_presupuestal_adicional->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formSeccionA" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Seccion P Adicional --}}
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
                                <tr>
                                    <td>{{ $sector->codigo }}</td>
                                    <td>{{ $sector->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$sector->id) }}" data-toggle="modal" data-target="#ModalEditSector{{ $sector->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$sector->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Secor --}}
                                    <form action="{{ route('presupuesto.update', $sector->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditSector{{ $sector->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit sector</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $sector->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $sector->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formSector" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Secor --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center row-table" id="row-sector">
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
                                <tr>
                                    <td>{{ $sector->codigo }}</td>
                                    <td>{{ $sector->descripcion }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('presupuesto.edit',$detalle_sectorial->id) }}" data-toggle="modal" data-target="#ModalEditDetalle{{ $detalle_sectorial->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$sector->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                    </td>
                                    <form action="{{ route('presupuesto.update', $sector->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditSector{{ $sector->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit sector</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $sector->codigo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $sector->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formSector" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

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
                                <tr>
                                    <td>{{ $situacion_fondo->codigo }}</td>
                                    <td>{{ $situacion_fondo->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$situacion_fondo->id) }}" data-toggle="modal" data-target="#ModalEditSituacionF{{ $situacion_fondo->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$situacion_fondo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Situacion Fondo --}}
                                    <form action="{{ route('presupuesto.update', $situacion_fondo->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditSituacionF{{ $situacion_fondo->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit situacion_fondo</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $situacion_fondo->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $situacion_fondo->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formSituacionF" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Situacion Fondo --}}
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
                                <tr>
                                    <td>{{ $tercero->codigo }}</td>
                                    <td>{{ $tercero->entidad }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$tercero->id) }}" data-toggle="modal" data-target="#ModalEditTercero{{ $tercero->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$tercero->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Tercero --}}
                                    <form action="{{ route('presupuesto.update', $tercero->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditTercero{{ $tercero->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit tercero</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $tercero->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Entidad:</strong>
                                                                <input type="text" name="entidad" class="form-control" value="{{ $tercero->entidad }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formTercero" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Tercero --}}
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
                                <tr>
                                    <td>{{ $tipo_norma->codigo }}</td>
                                    <td>{{ $tipo_norma->descripcion }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$tipo_norma->id) }}" data-toggle="modal" data-target="#ModalEditTipoN{{ $tipo_norma->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$tipo_norma->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Tipo Norma --}}
                                    <form action="{{ route('presupuesto.update', $tipo_norma->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditTipoN{{ $tipo_norma->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit tipo_norma</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $tipo_norma->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $tipo_norma->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formTipoN" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Tipo Norma --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center row-table" id="row-vigencia-gastos">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>Codigo</th>
                            <th>Descripción</th>
                            <th>Accion</th>
                        </thead>
                        <tbody>
                            @foreach ($vigencia_gastos as $vigencia_gasto)
                                <tr>
                                    <td>{{ $vigencia_gasto->codigo }}</td>
                                    <td>{{ $vigencia_gasto->descripcion }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('presupuesto.edit',$vigencia_gasto->id) }}" data-toggle="modal" data-target="#ModalEditVigenciaG{{ $vigencia_gasto->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$vigencia_gastos->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                    </td>
                                    <form action="{{ route('presupuesto.update', $vigencia_gasto->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditVigenciaG{{ $vigencia_gasto->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit vigencia_gasto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $vigencia_gasto->codigo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Descripcion:</strong>
                                                                <input type="text" name="descripcion" class="form-control" value="{{ $vigencia_gasto->descripcion }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formVigenciaG" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

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
                                <tr>
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
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$bpin->id) }}" data-toggle="modal" data-target="#ModalEditBpin{{ $bpin->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$bpin->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Bpin --}}
                                    <form action="{{ route('presupuesto.update', $bpin->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditBpin{{ $bpin->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit bpin</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Confinanciado:</strong>
                                                                <input type="text" name="confinanciado" class="form-control" value="{{ $bpin->confinanciado }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Entidad:</strong>
                                                                <input type="text" name="entidad" class="form-control" value="{{ $bpin->entidad }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Secretaria_id:</strong>
                                                                <input type="text" name="secretaria_id" class="form-control" value="{{ $bpin->secretaria_id }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>cod_sector:</strong>
                                                                <input type="text" name="cod_sector" class="form-control" value="{{ $bpin->cod_sector }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>nombre_sector:</strong>
                                                                <input type="text" name="nombre_sector" class="form-control" value="{{ $bpin->nombre_sector }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>cod_proyecto:</strong>
                                                                <input type="text" name="cod_proyecto" class="form-control" value="{{ $bpin->cod_proyecto }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>actividad:</strong>
                                                                <input type="text" name="actividad" class="form-control" value="{{ $bpin->actividad }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>metas:</strong>
                                                                <input type="text" name="metas" class="form-control" value="{{ $bpin->metas }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>cod_producto:</strong>
                                                                <input type="text" name="cod_producto" class="form-control" value="{{ $bpin->cod_producto }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>nombre_producto:</strong>
                                                                <input type="text" name="nombre_producto" class="form-control" value="{{ $bpin->nombre_producto }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>cod_indicador:</strong>
                                                                <input type="text" name="cod_indicador" class="form-control" value="{{ $bpin->cod_indicador }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>nombre_indicador:</strong>
                                                                <input type="text" name="nombre_indicador" class="form-control" value="{{ $bpin->nombre_indicador }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>propios:</strong>
                                                                <input type="text" name="propios" class="form-control" value="{{ $bpin->propios }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>sgp:</strong>
                                                                <input type="text" name="sgp" class="form-control" value="{{ $bpin->sgp }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>total:</strong>
                                                                <input type="text" name="total" class="form-control" value="{{ $bpin->total }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formBpin" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Bpin --}}
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
                                <tr>
                                    <td>{{ $dependencia->code }}</td>
                                    <td>{{ $dependencia->nombre }}</td>
                                    <td>{{ $dependencia->encargado }}</td>
                                    <td class="d-flex">
                                        @if ($opciones)
                                        <a class="btn btn-primary mr-2" href="{{ route('presupuesto.edit',$dependencia->id) }}" data-toggle="modal" data-target="#ModalEditDependencia{{ $dependencia->id }}"><i class="fa fa-edit"></i>Editar</a>
                                        <form action="{{ route('presupuesto.destroy',$dependencia->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                        </form>
                                        @endif
                                    </td>
                                    {{--  Modal Dependencia --}}
                                    <form action="{{ route('presupuesto.update', $dependencia->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade text-left" id="ModalEditDependencia{{ $dependencia->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit dependencia</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Codigo:</strong>
                                                                <input type="text" name="codigo" class="form-control" value="{{ $dependencia->codigo }}">
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Nombre:</strong>
                                                                <input type="text" name="nombre" class="form-control" value="{{ $dependencia->nombre }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Encargado:</strong>
                                                                <input type="text" name="encargado" class="form-control" value="{{ $dependencia->encargado }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <button type="submit" name="formDependencia" class="btn float-right btn-success">Editar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Fin Modal Dependencia --}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
