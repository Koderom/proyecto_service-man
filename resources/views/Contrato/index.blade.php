@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Contratos</h1>
    @can('contrato.create')
    <a class="boton --crear" href="{{route('contrato.create')}}">Crear nuevo</a>    
    @endcan
    
</header>
<section>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Propietario</th>
            <th class="tabla-datos__casilla-titulo">Tipo de servicio</th>
            <th class="tabla-datos__casilla-titulo">Fecha instalacion</th>
            <th class="tabla-datos__casilla-titulo">Cobrar cada</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($Contratos as $contrato)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$contrato->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->cliente->persona->nombre}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->tipo_servicio}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->fecha_instalacion}}</td>
            <td class="tabla-datos__casilla-datos">{{$contrato->intervalo_cobro}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('contrato.edit')
                <a href="{{ route('contrato.edit', $contrato)}}">E</a>    
                @endcan
                @can('contrato.destroy')
                <form action="{{ route('contrato.destroy', $contrato)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit">D</button>
                </form>    
                @endcan
                
            </td>
        </tr>
            
        @endforeach
        
    </table>
</section>
@endsection