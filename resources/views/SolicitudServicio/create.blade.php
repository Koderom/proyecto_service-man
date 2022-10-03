@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Registrar nueva solicitud</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action={{route('solicitud.store') }} class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos de la solicitud</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <input type="hidden" id="contrato" name="contrato" value={{old('contrato',$contrato->id)}}>
                    @error('contrato')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="motivo">Motivo de la solicitud:</label>
                    <input type="text" id="motivo" name="motivo" value={{old('motivo')}}>
                    @error('motivo')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="tipo_servicio">Tipo de servicio solicitado:</label>
                    <select name="tipo_servicio" id="tipo_servicio">
                        @foreach ($Servicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->descripcion}}</option>
                        @endforeach
                    </select>
                    @error('descripcion')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('solicitud.store')
            <button type="submit">Registrar</button>    
            @endcan
            @can('solicitud.index')
            <a href={{ route('solicitud.index') }}>Cancelar</a>    
            @endcan
        </div>
    </form>
</section>
@endsection