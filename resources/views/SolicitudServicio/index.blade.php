@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Solicitud de servicios</h1>
</header>
<section>
    <div class="encabezado-principal">
        <h2 class="titulo-formulario">Contratos</h2>
    </div>
    
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Propietario</th>
            <th class="tabla-datos__casilla-titulo">Tipo de servicio</th>
            <th class="tabla-datos__casilla-titulo">Fecha instalacion</th>
            <th class="tabla-datos__casilla-titulo">Cobrar cada</th>
            <th class="tabla-datos__casilla-titulo">Ubicacion</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($Contratos as $contrato)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$contrato->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->cliente->persona->nombre}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->tipo_servicio}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->fecha_instalacion}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->intervalo_cobro}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->establecimiento->direccion_exacta}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('solicitud.create')
                <a href="{{ route('solicitud.create', $contrato)}}">Agendar</a>    
                @endcan
                
            </td>
        </tr>
        @endforeach
    </table>
    <div class="encabezado-principal">
        <h2 class="titulo-formulario">Servicios solicitados</h2>
    </div>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Codigo de solicitud</th>
            <th class="tabla-datos__casilla-titulo">Motivo</th>
            <th class="tabla-datos__casilla-titulo">Estado</th>
            <th class="tabla-datos__casilla-titulo">Fecha de solicitud</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($SolicitudServicios as $solicitud)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$solicitud->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$solicitud->cod_solicitud_servicio}}</td>
            <td class="tabla-datos__casilla-datos">{{$solicitud->motivo}}</td>
            @if ($solicitud->estado[0] == 'P')
            <td class="tabla-datos__casilla-datos">Pendiente</td>
            @endif
            @if ($solicitud->estado[0] == 'A')
            <td class="tabla-datos__casilla-datos">Confirmado</td>
            @endif
            @if ($solicitud->estado[0] == 'C')
            <td class="tabla-datos__casilla-datos">Cancelado</td>
            @endif
            <td class="tabla-datos__casilla-datos">{{$solicitud->fecha_solicitud}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @if ($solicitud->estado[0]=='A')
                @can('orden.index')
                <a href={{ route('orden.index')}}>Ver orden</a>        
                @endcan
                @else
                @can('orden.create')
                <a href={{ route('orden.create', $solicitud)}}>Aceptar</a>    
                @endcan
                @can('solicitud.cancelar')
                <a href={{ route('solicitud.cancelar', $solicitud)}}>Cancelar</a>        
                @endcan
                @endif
                
            </td>
        </tr>
            
        @endforeach
        
    </table>
    
    
</section>
@endsection