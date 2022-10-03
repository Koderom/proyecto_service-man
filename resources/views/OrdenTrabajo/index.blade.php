@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Orden de Trabajo</h1>
</header>
<section>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Codigo</th>
            <th class="tabla-datos__casilla-titulo">Dia Programado</th>
            <th class="tabla-datos__casilla-titulo">A partir de</th>
            <th class="tabla-datos__casilla-titulo">Hasta</th>
            <th class="tabla-datos__casilla-titulo">Estado</th>
            <th class="tabla-datos__casilla-titulo">Asignado a</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($OrdenTrabajos as $ordenTrabajo)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->cod_orden_trabajo}}</td>
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->dia_programado}}</td>
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->hora_inicio}}</td>
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->hora_fin}}</td>
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->estado}}</td>
            @if ($ordenTrabajo->trabajador != null)
            <td class="tabla-datos__casilla-datos">{{$ordenTrabajo->trabajador->persona->nombre}}</td>    
            @else
            <td class="tabla-datos__casilla-datos">pendiente</td>    
            @endif
            <td class="tabla-datos__casilla-datos --opciones">
                @if ($ordenTrabajo->estado == 'pendiente')
                @can('orden.aceptar')
                <a href={{ route('orden.aceptar', $ordenTrabajo)}}>aceptar</a>    
                @endcan
                @can('orden.asignar')
                <a href={{ route('orden.asignar', $ordenTrabajo)}}>asignar</a>        
                @endcan
                @else
                @can('orden.asignar')
                <a href={{ route('orden.asignar', $ordenTrabajo)}}>re-asignar</a>    
                @endcan
                @endif
                
            </td>
        </tr>
            
        @endforeach
        
    </table>
</section>
@endsection