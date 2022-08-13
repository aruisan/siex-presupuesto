@extends('layouts.app')

@section('content')

@if ($tipo == 'cpc')
<form action="{{ route('presupuesto.update', $cpc->id) }}" method="post" enctype="multipart/form-data">

    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Cpc</h2>
    <hr>
    <input type="hidden" name='tipo' value="cpc">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $cpc->codigo }}">
        </div>
    </div>
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous() }}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formCpc" class="btn btn-success ">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'puc')
<form action="{{ route('presupuesto.update', $puc->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Puc</h2>
    <hr>
    <input type="hidden" name='tipo' value="puc">
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous() }}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formPuc" class="btn btn-success ">Actualizar</button>
        </div>
    </div>

</form>
@endif

@if ($tipo == 'fuente')
<form action="{{ route('presupuesto.update', $fuente->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Fuente</h2>
    <hr>
    <input type="hidden" name='tipo' value="fuente">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $fuente->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcion" class="form-control" value="{{ $fuente->descripcion }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formFuente" class="btn btn-success ">Actualizar</button>
        </div>
    </div>
</form>
@endif

 @if ($tipo == 'politica')
<form action="{{ route('presupuesto.update', $politica->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Politica</h2>
    <hr>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Codigo:</strong>
                <input type="text" name="codigo" class="form-control" value="{{ $politica->codigo }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Clase:</strong>
                <input type="text" name="descripcion" class="form-control" value="{{ $politica->descripcion }}">
            </div>
        </div>

        <div class="form-group input-group my-2 col-md-12">
            <div class="col-lg-12 ml-auto mt-3 text-center">
                <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
                <button type="submit" name="formPolitica" class="btn btn-success">Actualizar</button>
            </div>
        </div>
</form>
@endif

@if ($tipo == 'producto_mga')
<form action="{{ route('presupuesto.update', $producto_mga->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Poducto Mga</h2>
    <hr>
    <input type="hidden" name='tipo' value="producto_mga">
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $producto_mga->codigo }}">
        </div>
    </div>
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formProducto" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'programa_mga')
<form action="{{ route('presupuesto.update', $programa_mga->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Programa Mga</h2>
    <hr>
    <input type="hidden" name='tipo' value="programa_mga">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $programa_mga->codigo }}">
        </div>
    </div>
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formPrograma" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'detalle_sectorial')
<form action="{{ route('presupuesto.update', $detalle_sectorial->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Detalle Sectorial</h2>
    <hr>
    <input type="hidden" name='tipo' value="detalle_sectorial">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $detalle_sectorial->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcion" class="form-control" value="{{ $detalle_sectorial->descripcion }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formDetalle" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'seccion_presupuestal')
<form action="{{ route('presupuesto.update', $seccion_presupuestal->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Seccion Presupuestal</h2>
    <hr>
    <input type="hidden" name='tipo' value="seccion_presupuestal">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $seccion_presupuestal->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcion" class="form-control" value="{{ $seccion_presupuestal->descripcion }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formSeccion" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'seccion_presupuestal_adicional')
<form action="{{ route('presupuesto.update', $seccion_presupuestal_adicional->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Seccion Presupuestal Adicional</h2>
    <hr>
    <input type="hidden" name='tipo' value="seccion_presupuestal_adicional">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $seccion_presupuestal_adicional->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcion" class="form-control" value="{{ $seccion_presupuestal_adicional->descripcion }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formSeccionA" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'sector')
<form action="{{ route('presupuesto.update', $sector->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Sector</h2>
    <hr>
    <input type="hidden" name='tipo' value="sector">
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formSector" class="btn btn-success ">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'situacion_fondo')
<form action="{{ route('presupuesto.update', $situacion_fondo->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Situacion de Fondo</h2>
    <hr>
    <input type="hidden" name='tipo' value="situacion_fondo">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $situacion_fondo->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcion" class="form-control" value="{{ $situacion_fondo->descripcion }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formSituacionF" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'tercero')
<form action="{{ route('presupuesto.update', $tercero->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando tercero</h2>
    <hr>
    <input type="hidden" name='tipo' value="tercero">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $tercero->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Entidad:</strong>
            <input type="text" name="entidad" class="form-control" value="{{ $tercero->entidad }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formTercero" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'tipo_norma')
<form action="{{ route('presupuesto.update', $tipo_norma->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Tipo Norma</h2>
    <hr>
    <input type="hidden" name='tipo' value="tipo_norma">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="codigo" class="form-control" value="{{ $tipo_norma->codigo }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcion" class="form-control" value="{{ $tipo_norma->descripcion }}">
        </div>
    </div>
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formTipoN" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'bpin')
<form action="{{ route('presupuesto.update', $bpin->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Bpin</h2>
    <hr>
    <input type="hidden" name='tipo' value="bpin">
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formBpin" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@if ($tipo == 'dependencia')
<form action="{{ route('presupuesto.update', $dependencia->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <br>
    <h2 class="text-center">Editando Dependencia</h2>
    <hr>
    <input type="hidden" name='tipo' value="dependencia">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Codigo:</strong>
            <input type="text" name="code" class="form-control" value="{{ $dependencia->code }}">
        </div>
    </div>
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
    <div class="form-group input-group my-2 col-md-12">
        <div class="col-lg-12 ml-auto mt-3 text-center">
            <a href="{{ url()->previous()}}" class="btn mr-5 btn-danger">Cancelar</a>
            <button type="submit" name="formDependencia" class="btn btn-success">Actualizar</button>
        </div>
    </div>
</form>
@endif

@endsection
