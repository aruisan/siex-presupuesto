@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">importar excel </div>
                <div class="card-body">
                   <form id="formuilario" method="post"  enctype="multipart/form-data" action="{{route('importar.tablas')}}">
                    @csrf
                        <select name="select_tabla" id="select_tabla" class="form-control">
                        </select>
                        <input class="form-control" name="file_import" type="file"/>
                        <button type="submit" class="btn btn-primary">Importar</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const tablas = [
            'detalle sectorial', 'cpc', 'fuente de financiacion', 'politica publica', 'producto mga', 'programa mga', 'seccion presupuestal',
            'seccion presupuestal adicional', 'sector', 'situacion de fondo', 'tercero', 'tipo de norma', 'vigencia', 'vigencia gasto'
        ];
        $(document).ready(function(){
            select_load();
        });

        const select_load = () => {
            tablas.forEach(e => {
                $('#select_tabla').append(`<option value="${e}">${e} Importar</option>`);
            }); 
        }
    </script>
@endsection
