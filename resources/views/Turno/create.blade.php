@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Registrar nuevo turno</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action={{route('turno.store') }} class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos del turno</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" id="descripcion" name="descripcion" value={{old('descripcion')}}>
                    @error('descripcion')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="hora_inicio">Hora de inicio:</label>
                    <input type="time" id="hora_inicio" name="hora_inicio" value={{old('hora_inicio')}}>
                    @error('hora_inicio')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="hora_fin">Hora de finalizacion:</label>
                    <input type="time" id="hora_fin" name="hora_fin" value={{old('hora_fin')}}>
                    @error('hora_fin')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('turno.store')
            <button type="submit">Registrar</button>    
            @endcan
            @can('turno.index')
            <a href={{ route('turno.index') }}>Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection