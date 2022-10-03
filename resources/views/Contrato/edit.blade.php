@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Editar datos del cliente Cliente</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action="{{route('contrato.update',$contrato) }}" class="formulario-datos">
        @method('put')
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Propietario del contrato</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nombre">Seleccione el cliente al que pertenecerá el contrato:</label>
                    <select name="nombre" id="nombre">
                        @foreach ($Clientes as $cliente)
                            @if ($cliente->id == $contrato->cliente_id)
                            <option value="{{$cliente->id}}" selected>{{$cliente->persona->nombre}} - {{$cliente->persona->cedula_identidad}}</option>    
                            @else
                            <option value="{{$cliente->id}}">{{$cliente->persona->nombre}} - {{$cliente->persona->cedula_identidad}}</option>    
                            @endif
                            
                        @endforeach
                    </select>
                    @error('nombre')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos del contrato</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="forma_pago">Forma de pago:</label>
                    <input type="text" id="forma_pago" name="forma_pago" value="{{old('forma_pago', $contrato->forma_pago)}}">
                    @error('forma_pago')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="tipo_tarjeta">Tipo de tarjeta:</label>
                    <input type="text" id="tipo_tarjeta" name="tipo_tarjeta" value="{{old('tipo_tarjeta', $contrato->tipo_tarjeta)}}">
                    @error('tipo_tarjeta')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="banco">Banco:</label>
                    <input type="text" id="banco" name="banco" value="{{old('banco', $contrato->banco)}}">
                    @error('banco')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nro_tarjeta">Numero de targeta:</label>
                    <input type="text" id="nro_tarjeta" name="nro_tarjeta" value="{{old('nro_tarjeta', $contrato->nro_tarjeta)}}">
                    @error('nro_tarjeta')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="intervalo_cobro">Cobrar Cada:</label>
                    <select name="intervalo_cobro" id="intervalo_cobro">
                        <option value="15 dias" @if ($contrato->intervalo_cobro == "15 dias")
                            selected
                        @endif>15 dias</option>
                        <option value="Mes" @if ($contrato->intervalo_cobro == "Mes")
                            selected
                        @endif>Mes</option>
                        <option value="Trimeste" @if ($contrato->intervalo_cobro == "Trimestre")
                            selected
                        @endif>Trimeste</option>
                        <option value="Semestre" @if ($contrato->intervalo_cobro == "Semestre")
                            selected
                        @endif>Semestre</option>
                    </select>
                    @error('interva_cobro')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="fecha_instalacion">Fecha de instalacion:</label>
                    <input type="date" id="fecha_instalacion" name="fecha_instalacion" value="{{old('fecha_instalacion', $contrato->fecha_instalacion)}}">
                    @error('fecha_instalacion')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="tipo_servicio">Tipo de servicio contratado:</label>
                    <input type="text" id="tipo_servicio" name="tipo_servicio" value="{{old('tipo_servicio', $contrato->tipo_servicio)}}">
                    @error('tipo_servicio')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos del Establecimiento</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento" id="departamento">
                        <option value="Santa Cruz" @if ($contrato->establecimiento->departament == "Santa Cruz")
                            selected
                        @endif>Santa Cruz</option>
                        <option value="La paz" @if ($contrato->establecimiento->departamento == "La paz")
                            selected
                        @endif>La paz</option>
                        <option value="Cochabamba" @if ($contrato->establecimiento->departamento == "Cochabamba")
                            selected
                        @endif>Cochabamba</option>
                        <option value="Tarija" @if ($contrato->establecimiento->departamento == "Tarija")
                            selected
                        @endif>Tarija</option>
                        <option value="Sucre" @if ($contrato->establecimiento->departamento == "Sucre")
                            selected
                        @endif>Sucre</option>
                        <option value="Oruro" @if ($contrato->establecimiento->departamento == "Oruro")
                            selected
                        @endif>Oruro</option>
                        <option value="Potosí" @if ($contrato->establecimiento->departamento == "Potosí")
                            selected
                        @endif>Potosí</option>
                        <option value="Beni" @if ($contrato->establecimiento->departamento == "Beni")
                            selected
                        @endif>Beni</option>
                        <option value="Pando" @if ($contrato->establecimiento->departamento == "Pando")
                            selected
                        @endif>Pando</option>
                    </select>
                    @error('departamento')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="provincia">provincia:</label>
                    <input type="text" id="provincia" name="provincia" value="{{old('provincia', $contrato->establecimiento->provincia)}}">
                    @error('provincia')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="zona">Zona:</label>
                    <input type="text" id="zona" name="zona" value="{{old('zona', $contrato->establecimiento->zona)}}">
                    @error('zona')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="direccion_exacta">Direccion exacta:</label>
                    <input type="text" id="direccion_exacta" name="direccion_exacta" value="{{old('direccion_exacta', $contrato->establecimiento->direccion_exacta)}}">
                    @error('direccion_exacta')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('contrato.update')
            <button type="submit">Guardar cambios</button>    
            @endcan
            @can('contrato.index')
            <a href="{{ route('contrato.index') }}">Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection