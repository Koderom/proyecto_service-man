@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Administradores</h1>
    @can('administrador.create')
    <a class="boton --crear" href="{{route('administrador.create')}}">Crear nuevo</a>    
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
        @foreach ($Administradores as $administrador)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$administrador->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$administrador->persona->nombre}}</td>
            <td class="tabla-datos__casilla-datos">{{$administrador->persona->primer_apellido}}</td>
            <td class="tabla-datos__casilla-datos">{{$administrador->persona->segundo_apellido}}</td>
            <td class="tabla-datos__casilla-datos">{{$administrador->cargo}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('administrador.edit')
                <a href="{{ route('administrador.edit', $administrador)}}">E</a>    
                @endcan
                @can('administrador.destroy')
                <form action="{{ route('administrador.destroy', $administrador)}}" method="POST">
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