@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Registrar Contrato</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action="{{route('contrato.store') }}" class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Propietario del contrato</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nombre">Seleccione el cliente al que pertenecerá el contrato:</label>
                    <select name="nombre" id="nombre">
                        @foreach ($Clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->persona->nombre}} - {{$cliente->persona->cedula_identidad}}</option>
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
                    <input type="text" id="forma_pago" name="forma_pago" value="{{old('forma_pago')}}">
                    @error('forma_pago')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="tipo_tarjeta">Tipo de tarjeta:</label>
                    <input type="text" id="tipo_tarjeta" name="tipo_tarjeta" value="{{old('tipo_tarjeta')}}">
                    @error('tipo_tarjeta')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="banco">Banco:</label>
                    <input type="text" id="banco" name="banco" value="{{old('banco')}}">
                    @error('banco')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nro_tarjeta">Numero de targeta:</label>
                    <input type="text" id="nro_tarjeta" name="nro_tarjeta" value="{{old('nro_tarjeta')}}">
                    @error('nro_tarjeta')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="intervalo_cobro">Cobrar Cada:</label>
                    <select name="intervalo_cobro" id="intervalo_cobro">
                        <option value="15 dias">15 dias</option>
                        <option value="Mes">Mes</option>
                        <option value="Trimeste">Trimeste</option>
                        <option value="Semestre">Semestre</option>
                    </select>
                    @error('interva_cobro')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="fecha_instalacion">Fecha de instalacion:</label>
                    <input type="date" id="fecha_instalacion" name="fecha_instalacion" value="{{old('fecha_instalacion')}}">
                    @error('fecha_instalacion')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="tipo_servicio">Tipo de servicio contratado:</label>
                    <input type="text" id="tipo_servicio" name="tipo_servicio" value="{{old('tipo_servicio')}}">
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
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="La paz">La paz</option>
                        <option value="Cochabamba">Cochabamba</option>
                        <option value="Tarija">Tarija</option>
                        <option value="Sucre">Sucre</option>
                        <option value="Oruro">Oruro</option>
                        <option value="Potosí">Potosí</option>
                        <option value="Beni">Beni</option>
                        <option value="Pando">Pando</option>
                    </select>
                    @error('departamento')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="provincia">provincia:</label>
                    <input type="text" id="provincia" name="provincia" value="{{old('provincia')}}">
                    @error('provincia')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="zona">Zona:</label>
                    <input type="text" id="zona" name="zona" value="{{old('zona')}}">
                    @error('zona')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="direccion_exacta">Direccion exacta:</label>
                    <input type="text" id="direccion_exacta" name="direccion_exacta" value="{{old('direccion_exacta')}}">
                    @error('direccion_exacta')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Seleccione ubicacion</h2>
            <div id="map" style="width: 100%; height: 20rem;"></div>
            <label for="latitud">lat</label>
            <input type="text" id="latitud" name="latitud" value="-17.788306170487214">
            <label for="longitud">long</label>
            <input type="text" id="longitud" name="longitud" value="-63.17956924438474">
        </section>
        
        <div class="formulario-datos__opciones">
            @can('contrato.store')
            <button type="submit">Registrar</button>    
            @endcan
            @can('contrato.index')
            <a href="{{ route('contrato.index') }}">Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -17.788306170487214, lng: -63.17956924438474},
            zoom: 15
        });
        marcador = new google.maps.Marker({
            map: map,
            draggable: true,
            position: new google.maps.LatLng(-17.788306170487214,-63.17956924438474)
        });
        marcador.addListener('dragend', function(event){
            //document.getElementById("lat").textContent = this.getPosition().lat();
            document.getElementById("latitud").value = this.getPosition().lat();
            //document.getElementById("lng").textContent = this.getPosition().lng();
            document.getElementById("longitud").value = this.getPosition().lng();
        })
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6JmGORKD7Q5wNpOFNOX3BRrfIA1q-sXA&callback=initMap"
async defer></script>



@endsection