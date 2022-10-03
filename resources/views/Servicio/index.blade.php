@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Servicios</h1>
    @can('servicio.create')
    <a class="boton --crear" href={{route('servicio.create')}}>Crear nuevo</a>    
    @endcan
    
</header>
<section>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Descripcion</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($Servicios as $servicio)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$servicio->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$servicio->descripcion}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('servicio.edit')
                <a href={{ route('servicio.edit', $servicio)}}>E</a>    
                @endcan
                @can('servicio.destroy')
                <form action={{ route('servicio.destroy', $servicio)}} method="POST">
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