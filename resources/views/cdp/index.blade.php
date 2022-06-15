@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rubros </div>
                <div class="card-body">
                    <a href="{{route('cdp.create')}}" class="btn btn-primary">Cdps</a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th>
                                    valor
                                </th>
                                <th>
                                    rubro
                                </th>
                                <th>
                                    estado
                                </th>
                            </thead>
                            <tbody>
                                @foreach($cdps as $item)
                                    <tr>
                                        <td>
                                            $ {{$item->valor}}
                                        </td>
                                        <td>
                                            {{$item->rubro->puc->codigo}} - {{$item->rubro->puc->categoria}}
                                        </td>
                                        <td>
                                            {{$item->estado}}
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
