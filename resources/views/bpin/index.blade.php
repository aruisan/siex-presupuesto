@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">BPins </div>
                <div class="card-body">
                    <a href="{{route('bpin.create')}}" class="btn btn-primary">Nuevo Bpin</a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>
                                    valor
                                </th>
                                <th>
                                    Cod Bpin
                                </th>
                                <th>
                                    Proyecto Bpin
                                </th>
                                <th>
                                    rubro
                                </th>
                            </thead>
                            <tbody>
                                @foreach($bpins as $item)
                                    <tr>
                                        <td>
                                            $ {{$item->valor}}
                                        </td>
                                        <td>
                                            {{$item->codigo}}
                                        </td>
                                         <td>
                                            {{$item->proyecto}}
                                        </td>
                                        <td>
                                           {{$item->rubro->puc->codigo}} - {{$item->rubro->puc->categoria}}
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
