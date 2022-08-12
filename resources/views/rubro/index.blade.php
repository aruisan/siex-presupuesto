@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('presupuesto.historial', $vigencia->id) }}">Presupuestos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="">Rubros</a>
            </li>
        </ul>
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Rubros </div>
                <div class="card-body">
                    <a href="{{route('rubro.create',$vigencia->id)}}" class="btn mb-3 btn-primary">Crear rubro</a>

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
                                <th>
                                    Accion
                                </th>
                            </thead>
                            <tbody>
                                @foreach($rubros as $item)
                                    <tr>
                                        <td>
                                            {{$item->pucs->codigo}}
                                        </td>
                                        <td>
                                            {{$item->pucs->categoria}}
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
                                        <td>
                                            <form action="{{ route('rubro.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href=""><i class="fa fa-trash"></i>Eliminar</button>
                                            </form>
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
