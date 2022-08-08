<table>
    <thead>
        <tr>

            @if ($select == 'cpcs')
                <th>Codigo</th>
                <th>Clase</th>
                <th>Sección</th>
                <th>División</th>
            @endif
            @if ($select == 'pucs')
                <th>Codigo</th>
                <th>Categoria</th>
                <th>Municipio</th>
            @endif
            @if ($select == 'fuente de financiacion')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'politica publica')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'producto mga')
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Sector</th>
                <th>Programa</th>
            @endif
            @if ($select == 'programa mga')
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Sector</th>
            @endif
            @if ($select == 'detalle sectorial')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'seccion presupuestal')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'seccion presupuestal adicional')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'sector')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'situacion de fondo')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'tercero')
                <th>Codigo</th>
                <th>Entidad</th>
            @endif
            @if ($select == 'tipo de norma')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'tipo de norma')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'tipo de norma')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'vigencia gasto')
                <th>Codigo</th>
                <th>Descripción</th>
            @endif
            @if ($select == 'bpins')
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
            @endif
            @if ($select == 'secretarias')
                <th>Codigo</th>
                <th>Secretaria</th>
                <th>Encargado</th>
            @endif
        </tr>
    </thead>
    <tbody>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td>Despues de llenarlo por favor borrar los titulos para poder importar</td>
        </tr>
    </tbody>
</table>
