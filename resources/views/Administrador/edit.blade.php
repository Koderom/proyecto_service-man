@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Editar datos del administrador</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action="{{route('administrador.update',$administrador) }}" class="formulario-datos">
        @method('put')
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos personales</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre',$administrador->persona->nombre)}}">
                    @error('nombre')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_paterno">Apellido paterno:</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno',$administrador->persona->primer_apellido)}}">
                    @error('apellido_paterno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_materno">Apellido materno:</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno',$administrador->persona->segundo_apellido)}}">
                    @error('apellido_materno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="cedula_identidad">Cedula de identidad:</label>
                    <input type="number" id="cedula_identidad" name="cedula_identidad" value="{{old('cedula_identidad',$administrador->persona->cedula_identidad)}}">
                    @error('cedula_identidad')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="celular">Telefono:</label>
                    <input type="tel" id="celular" name="celular" value="{{old('celular',$administrador->persona->celular)}}">
                    @error('celular')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="email">Correo electronico:</label>
                    <input type="text" id="email" name="email" value="{{old('email',$administrador->persona->email)}}">
                    @error('email')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="sexo">Genero:</label>
                    @if ($administrador->persona->sexo[0]=='H')
                    <label>Hombre <input type="radio" name="sexo" value="H" checked></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" ></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @endif
                    @if ($administrador->persona->sexo[0]=='M')
                    <label>Hombre <input type="radio" name="sexo" value="H" ></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" checked></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @endif
                    @if ($administrador->persona->sexo[0]=='U')
                    <label>Hombre <input type="radio" name="sexo" value="H" ></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" ></label>
                    <label>Otro <input type="radio" name="sexo" value="U" checked></label>
                    @endif
                    @error('sexo')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$administrador->persona->fecha_nacimiento)}}">
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
                    <input type="text" id="cargo" name="cargo" value="{{old('cargo',$administrador->cargo)}}">
                    @error('cargo')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" id="nacionalidad" name="nacionalidad" value="{{old('nacionalidad',$administrador->nacionalidad)}}">
                    @error('nacionalidad')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="profesion">Profesion:</label>
                    <input type="text" id="profesion" name="profesion" value="{{old('profesion',$administrador->profesion)}}">
                    @error('profesion')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nro_registro_profesional">Registro profesional:</label>
                    <input type="number" id="nro_registro_profesional" name="nro_registro_profesional" value="{{old('registro_profesional',$administrador->nro_registro_profesional)}}">
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
                    <input type="text" id="correo_usuario" name="correo_usuario" value="{{old('correo_usuario',$administrador->persona->user->email)}}">
                    @error('correo_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="password_usuario">Contraseña:</label>
                    <input type="text" id="password_usuario" name="password_usuario" value="{{old('password_usuario',$administrador->persona->user->password)}}">
                    @error('password_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('administrador.update')
            <button type="submit">Guardad cambios</button>    
            @endcan
            @can('administrador.index')
            <a href="{{ route('administrador.index') }}">Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection