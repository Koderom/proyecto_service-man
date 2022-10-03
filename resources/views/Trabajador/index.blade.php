@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Trabajadores</h1>
    @can('trabajador.index')
    <a class="boton --crear" href="{{route('trabajador.create')}}">Crear nuevo</a>    
    @endcan
</header>
<section>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Nombre</th>
            <th class="tabla-datos__casilla-titulo">Apellido Paterno</th>
            <th class="tabla-datos__casilla-titulo">Apellido Materno</th>
            <th class="tabla-datos__casilla-titulo">Cargo</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($Trabajadores as $trabajador)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">dato generico</td>
            <td class="tabla-datos__casilla-datos">dato generico</td>
            <td class="tabla-datos__casilla-datos">dato generico</td>
            <td class="tabla-datos__casilla-datos">dato generico</td>
            <td class="tabla-datos__casilla-datos">dato generico</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('trabajador.edit')
                <a href="{{ route('trabajador.edit', $trabajador)}}">E</a>    
                @endcan
                @can('trabajador.destroy')
                <form action="{{ route('trabajador.destroy', $trabajador)}}" method="POST">
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