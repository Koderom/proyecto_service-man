@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Registrar nuevo servicio</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action={{route('servicio.store') }} class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos del servicio</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" value={{old('descripcion')}}>
                    @error('descripcion')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('servicio.store')
            <button type="submit">Registrar</button>    
            @endcan
            @can('servicio.index')
            <a href={{ route('servicio.index') }}>Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection