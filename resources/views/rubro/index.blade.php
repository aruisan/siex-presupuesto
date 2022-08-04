@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rubros </div>
                <div class="card-body">
                    <a href="{{route('rubro.create')}}" class="btn btn-primary">Crear rubro</a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>
                                    codigo
                                </th>
                                <th>
                                    Categoria
                                </th>
                                <th>
                                    dependencia
                                </th>
                                <th>
                                    Valor
                                </th>
                                <th>
                                    Valor Cdps
                                </th>
                                <th>
                                    Saldo
                                </th>
                            </thead>
                            <tbody>
                                @foreach($rubros as $item)
                                    <tr>
                                        <td>
                                            {{$item->puc->codigo}}
                                        </td>
                                        <td>
                                            {{$item->puc->categoria}}
                                        </td>
                                        <td>
                                            $ {{$item->dependencia->nombre}}
                                        </td>
                                        <td>
                                            $ {{$item->valor}}
                                        </td>
                                        <td>
                                            $ {{$item->suma_cdps}}
                                        </td>
                                        <td>
                                            $ {{$item->saldo}}
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
@endsection

@section('scripts')
    <script>

    </script>
@endsection
