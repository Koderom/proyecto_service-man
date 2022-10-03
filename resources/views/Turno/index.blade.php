@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Turnos</h1>
    @can('turno.create')
    <a class="boton --crear" href={{route('turno.create')}}>Crear nuevo</a>    
    @endcan
</header>
<section>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Descripcion</th>
            <th class="tabla-datos__casilla-titulo">Hora de Inicio</th>
            <th class="tabla-datos__casilla-titulo">Hora de finalizacion</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($Turnos as $turno)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$turno->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$turno->descripcion}}</td>
            <td class="tabla-datos__casilla-datos">{{$turno->hora_inicio}}</td>
            <td class="tabla-datos__casilla-datos">{{$turno->hora_fin}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('turno.edit')
                <a href={{ route('turno.edit', $turno)}}>E</a>    
                @endcan
                @can('turno.destroy')
                <form action={{ route('turno.destroy', $turno)}} method="POST">
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