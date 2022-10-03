@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Gestionar Clientes</h1>
    @can('cliente.create')
    <a class="boton --crear" href="{{route('cliente.create')}}">Crear nuevo</a>    
    @endcan
</header>
<section>
    <table class="tabla-datos">
        <tr class="tabla-datos__fila-encabezado">
            <th class="tabla-datos__casilla-titulo">ID</th>
            <th class="tabla-datos__casilla-titulo">Nombre</th>
            <th class="tabla-datos__casilla-titulo">Apellido Paterno</th>
            <th class="tabla-datos__casilla-titulo">Apellido Materno</th>
            <th class="tabla-datos__casilla-titulo">C.I:</th>
            <th class="tabla-datos__casilla-titulo">Celular</th>
            <th class="tabla-datos__casilla-titulo">Opciones</th>
        </tr>
        @foreach ($Clientes as $cliente)
        <tr class="tabla-datos__fila-datos">
            <td class="tabla-datos__casilla-datos">{{$cliente->id}}</td>
            <td class="tabla-datos__casilla-datos">{{$cliente->persona->nombre}}</td>
            <td class="tabla-datos__casilla-datos">{{$cliente->persona->primer_apellido}}</td>
            <td class="tabla-datos__casilla-datos">{{$cliente->persona->segundo_apellido}}</td>
            <td class="tabla-datos__casilla-datos">{{$cliente->persona->cedula_identidad}}</td>
            <td class="tabla-datos__casilla-datos">{{$cliente->persona->celular}}</td>
            <td class="tabla-datos__casilla-datos --opciones">
                @can('cliente.edit')
                <a href="{{ route('cliente.edit', $cliente)}}">E</a>    
                @endcan
                @can('cliente.destroy')
                <form action="{{ route('cliente.destroy', $cliente)}}" method="POST">
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