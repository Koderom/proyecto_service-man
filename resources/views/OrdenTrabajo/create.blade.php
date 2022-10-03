@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Confirmar solicitud de Servicio</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action={{route('orden.store') }} class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos del turno</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="dia_programado">Fecha programada de visita:</label>
                    <input type="date" id="dia_programado" name="dia_programado" value={{old('dia_programado')}}>
                    @error('dia_programado')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="hora_inicio">Esperar desde:</label>
                    <input type="time" id="hora_inicio" name="hora_inicio" value={{old('hora_inicio')}}>
                    @error('hora_inicio')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="hora_fin">Esperar Hasta:</label>
                    <input type="time" id="hora_fin" name="hora_fin" value={{old('hora_fin')}}>
                    @error('hora_fin')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <input type="hidden" id="solicitud" name="solicitud" value={{old('solicitud',$solicitud->id)}}>
                    @error('solicitud')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('orden.store')
            <button type="submit">Registrar</button>    
            @endcan
            @can('solicitud.index')
            <a href={{ route('solicitud.index') }}>Cancelar</a>    
            @endcan
        </div>
    </form>
</section>
@endsection