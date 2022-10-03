@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Asignar Orden de trabajo</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action={{route('orden.guardarAsignar') }} class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Seleccione un trabajador</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <input type="hidden" name="orden" id="orden" value="{{$orden->id}}">
                    <label for="trabajador">Trabajadores:</label>
                    <select name="trabajador" id="trabajador">
                        @foreach ($Trabajadores as $trabajador)
                        <option value="{{$trabajador->id}}">{{$trabajador->persona->nombre}}</option>    
                        @endforeach
                    </select>
                    @error('Trabajador')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('guardarAsignar')
            <button type="submit">Asignar</button>    
            @endcan
            @can('orden.index')
            <a href={{ route('orden.index') }}>Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection