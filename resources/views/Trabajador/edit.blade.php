@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Modificar datos trabajador</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action={{route('trabajador.update',$trabajador) }} class="formulario-datos">
        @method('put')
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos personales</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre', $trabajador->persona->nombre)}}">
                    @error('nombre')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_paterno">Apellido paterno:</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno', $trabajador->persona->primer_apellido)}}">
                    @error('apellido_paterno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_materno">Apellido materno:</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno', $trabajador->persona->segundo_apellido)}}">
                    @error('apellido_materno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="cedula_identidad">Cedula de identidad:</label>
                    <input type="number" id="cedula_identidad" name="cedula_identidad" value="{{old('cedula_identidad', $trabajador->persona->cedula_identidad)}}">
                    @error('cedula_identidad')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="celular">Telefono:</label>
                    <input type="tel" id="celular" name="celular" value="{{old('celular', $trabajador->persona->celular)}}">
                    @error('celular')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="email">Correo electronico:</label>
                    <input type="text" id="email" name="email" value="{{old('email', $trabajador->persona->email)}}">
                    @error('email')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="sexo">Genero:</label>
                    @if ($trabajador->persona->sexo[0]=='H')
                    <label>Hombre <input type="radio" name="sexo" value="H" checked></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" ></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @endif
                    @if ($trabajador->persona->sexo[0]=='M')
                    <label>Hombre <input type="radio" name="sexo" value="H" ></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" checked></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @endif
                    @if ($trabajador->persona->sexo[0]=='U')
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
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento', $trabajador->persona->fecha_nacimiento)}}">
                    @error('fecha_nacimiento')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos de trabajador</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <input type="text" id="nacionalidad" name="nacionalidad" value="{{old('nacionalidad', $trabajador->nacionalidad)}}">
                    @error('nacionalidad')
                    <br><small class="fSormulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="profesion">Profesion:</label>
                    <input type="text" id="profesion" name="profesion" value="{{old('profesion', $trabajador->profesion)}}">
                    @error('profesion')
                    <br><small class="fSormulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="nro_registro_profesional">Nro de Registro Profesional:</label>
                    <input type="number" id="nro_registro_profesional" name="nro_registro_profesional" value="{{old('nro_registro_profesional', $trabajador->nro_registro_profesional)}}">
                    @error('nro_registro_profesional')
                    <br><small class="fSormulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="grado_academico">Grado academico:</label>
                    <input type="text" id="grado_academico" name="grado_academico" value="{{old('grado_academico', $trabajador->grado_academico)}}">
                    @error('grado_academico')
                    <br><small class="fSormulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="turno">Turno:</label>
                    <select name="turno" id="turno">
                        @foreach ($turnos as $turno)
                        @if ($turno->id == $trabajador->turno->id)
                        <option value="{{$turno->id}}" selected>{{$turno->descripcion}}</option>
                        @else
                        <option value="{{$turno->id}}">{{$turno->descripcion}}</option>
                        @endif
                            
                        @endforeach
                    </select>
                    @error('turno')
                    <br><small class="fSormulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos de usuario</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="correo_usuario">Correo electronico:</label>
                    <input type="text" id="correo_usuario" name="correo_usuario" value="{{old('correo_usuario', $trabajador->persona->user->email)}}">
                    @error('correo_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="password_usuario">Contraseña:</label>
                    <input type="text" id="password_usuario" name="password_usuario" value="{{old('password_usuario', $trabajador->persona->user->password)}}">
                    @error('password_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('trabajador.update')
            <button type="submit">Registrar</button>    
            @endcan
            @can('trabajador.index')
            <a href={{ route('cliente.index') }}>Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection