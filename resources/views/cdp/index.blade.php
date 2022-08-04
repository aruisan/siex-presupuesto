@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rubros </div>
                <div class="card-body">
                     <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#cdps">Cdps</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#registros">RegistroS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#ordenes">Ordenes</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pagos">Pagos</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-4">
                        <div class="tab-pane active container" id="cdps">
                            <a href="{{route('cdp.create')}}" class="btn btn-primary mb-3">Solicitud Cdps</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            valor
                                        </th>
                                        <th>
                                           Aprobar
                                        </th>
                                        <th>
                                            Rechazar
                                        </th>
                                        <th>
                                            Anular
                                        </th>
                                        <th>
                                            Saldo
                                        </th>
                                        <th>
                                            Ver
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($cdps as $key => $item)
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->created_at}}
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                   <button class="btn btn-primary"> ver</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container" id="registros">
                            <a href="{{route('cdp.create')}}" class="btn btn-primary mb-3">Solicitud Registros</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            valor
                                        </th>
                                        <th>
                                           Aprobar
                                        </th>
                                        <th>
                                            Rechazar
                                        </th>
                                        <th>
                                            Anular
                                        </th>
                                        <th>
                                            Saldo
                                        </th>
                                        <th>
                                            Ver
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($cdps as $key => $item)
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->created_at}}
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                   <button class="btn btn-primary"> ver</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container" id="ordenes">
                            <a href="{{route('cdp.create')}}" class="btn btn-primary mb-3">Solicitud Ordenes</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            valor
                                        </th>
                                        <th>
                                           Aprobar
                                        </th>
                                        <th>
                                            Rechazar
                                        </th>
                                        <th>
                                            Anular
                                        </th>
                                        <th>
                                            Saldo
                                        </th>
                                        <th>
                                            Ver
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($cdps as $key => $item)
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->created_at}}
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                   <button class="btn btn-primary"> ver</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container" id="pagos">
                            <a href="{{route('cdp.create')}}" class="btn btn-primary mb-3">Solicitud Pagos</a>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            valor
                                        </th>
                                        <th>
                                           Aprobar
                                        </th>
                                        <th>
                                            Rechazar
                                        </th>
                                        <th>
                                            Anular
                                        </th>
                                        <th>
                                            Saldo
                                        </th>
                                        <th>
                                            Ver
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach($cdps as $key => $item)
                                            <tr>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$item->created_at}}
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    sin definir
                                                </td>
                                                <td>
                                                    $ {{$item->valor}}
                                                </td>
                                                <td>
                                                   <button class="btn btn-primary"> ver</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
    
    </script>
@endsection
