@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rubros </div>
                <div class="card-body">
                    <a href="{{route('cdp.create')}}" class="btn btn-primary">Cdps</a>
                    <form action="{{route('cdp.autorizar')}}" method="post">
                    @csrf
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
                                    Aprobar
                                </th>
                                <th>
                                    Rechazar
                                </th>
                                <th>
                                    Anular
                                </th>
                            </thead>
                            <tbody>
                                @foreach($cdps as $key => $item)
                                    <tr>
                                        <td>
                                            $ {{$item->valor}}
                                        </td>
                                        <td>
                                            {{$item->rubro->puc->codigo}} - {{$item->rubro->puc->categoria}}
                                        </td>
                                        @if(auth()->user()->cdp2)
                                            @if(!is_null($item->autorizar1) && is_null($item->autorizar2))
                                             <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox_{{$item->id}}" onclick="change_checkbox({{$item->id}}, 'aprobar')" name="estado[]" value="{{$item->id}}, aprobar" @if($item->autorizar2 == 'aprobar') checked @endif>
                                                    <label class="form-check-label" >Aprobar</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox_{{$item->id}}" onclick="change_checkbox({{$item->id}}, 'rechazar')" name="estado[]" value="{{$item->id}}, rechazar" @if($item->autorizar2 == 'rechazar') checked @endif>
                                                    <label class="form-check-label">Rechazar</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox_{{$item->id}}" onclick="change_checkbox({{$item->id}}, 'anular')" name="estado[]" value="{{$item->id}}, anular" @if($item->autorizar2 == 'anular') checked @endif>
                                                    <label class="form-check-label">Anular</label>
                                                </div>
                                            </td>
                                            @else
                                                <td>
                                                    En espera...
                                                </td>
                                                <td>
                                                    En espera...
                                                </td>
                                            @endif
                                        @elseif(is_null($item->autorizar1))
                                             <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox_{{$item->id}}" onclick="change_checkbox({{$item->id}}, 'aprobar')" name="estado[]" value="{{$item->id}}, aprobar"  @if($item->autorizar1 == 'aprobar') checked @endif>
                                                    <label class="form-check-label" >Aprobar</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox_{{$item->id}}" onclick="change_checkbox({{$item->id}}, 'rechazar')" name="estado[]" value="{{$item->id}}, rechazar"  @if($item->autorizar1 == 'rechazar') checked @endif>
                                                    <label class="form-check-label">Rechazar</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input checkbox_{{$item->id}}" onclick="change_checkbox({{$item->id}}, 'anular')" name="estado[]" value="{{$item->id}}, anular" @if($item->autorizar1 == 'anular') checked @endif>
                                                    <label class="form-check-label">Anular</label>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">
                            Guardar Cambios
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const change_checkbox = (id, action) =>{
            $(`.checkbox_${id}`).each(function() {
               if($(this).val() != `${id}, ${action}`){
                    $(this).prop('checked', false);
               }
            });
        }
    </script>
@endsection
