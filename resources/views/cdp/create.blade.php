@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Rubro </div>
                <div class="card-body">
                   <form  method="post" action="{{route('cdp.store')}}">
                    @csrf
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Valor del Cdp</label>
                            <input type="text" name="valor" class="form-control col-sm-7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group my-2 col-md-12">
                            <label for="" class="input-group-text input_text_label col-sm-5">Selecciona un rubro</label>
                            <select name="rubro_id" class="form-control input_text col-sm-7">
                                @foreach($rubros as $item)
                                    <option value="{{$item->id}}">{{$item->puc->categoria}} - {{$item->puc->codigo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
    
    </script>
@endsection
