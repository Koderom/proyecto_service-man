@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Registrar nuevo administrador</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action="{{route('administrador.store') }}" class="formulario-datos">
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos personales</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
                    @error('nombre')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_paterno">Apellido paterno:</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno')}}">
                    @error('apellido_paterno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_materno">Apellido materno:</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno')}}">
                    @error('apellido_materno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="cedula_identidad">Cedula de identidad:</label>
                    <input type="number" id="cedula_identidad" name="cedula_identidad" value="{{old('cedula_identidad')}}">
                    @error('cedula_identidad')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="celular">Telefono:</label>
                    <input type="tel" id="celular" name="celular" value="{{old('celular')}}">
                    @error('celular')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="email">Correo electronico:</label>
                    <input type="text" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="sexo">Genero:</label>
                    <label>Hombre <input type="radio" name="sexo" value="H" checked></label>
                    <label>Mujer <input type="radio" name="sexo" value="M" ></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @error('sexo')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                    @error('fecha_nacimiento')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos de administrador</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="cargo">Cargo:</label>
                    <input type="text" id="cargo" name="cargo" value="{{old('cargo')}}">
                    @error('cargo')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" id="nacionalidad" name="nacionalidad" value="{{old('nacionalidad')}}">
                    @error('nacionalidad')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="profesion">Profesion:</label>
                    <input type="text" id="profesion" name="profesion" value="{{old('profesion')}}">
                    @error('profesion')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nro_registro_profesional">Registro profesional:</label>
                    <input type="number" id="nro_registro_profesional" name="nro_registro_profesional" value="{{old('registro_profesional')}}">
                    @error('nro_registro_profesional')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos de usuario</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="correo_usuario">Correo electronico:</label>
                    <input type="text" id="correo_usuario" name="correo_usuario" value="{{old('correo_usuario')}}">
                    @error('correo_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="password_usuario">Contraseña:</label>
                    <input type="text" id="password_usuario" name="password_usuario" value="{{old('password_usuario')}}">
                    @error('password_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('administrador.store')
            <button type="submit">Registrar</button>    
            @endcan
            @can('administrador.index')
            <a href="{{ route('administrador.index') }}">Cancelar</a>    
            @endcan            
        </div>
    </form>
</section>
@endsection