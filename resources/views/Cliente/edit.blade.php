@extends('layouts.dashboard')
@section('contenedor-principal')
<header class="encabezado-principal">
    <h1 class="titulo-formulario">Editar datos del cliente Cliente</h1>
</header>
<section class="contenedor-formulario">
    
    <form method="POST" action="{{route('cliente.update',$cliente) }}" class="formulario-datos">
        @method('put')
        @csrf
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos personales</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre',$cliente->persona->nombre)}}">
                    @error('nombre')
                    <br>
                        <small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_paterno">Apellido paterno:</label>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno',$cliente->persona->primer_apellido)}}">
                    @error('apellido_paterno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="apellido_materno">Apellido materno:</label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno',$cliente->persona->segundo_apellido)}}">
                    @error('apellido_materno')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="cedula_identidad">Cedula de identidad:</label>
                    <input type="number" id="cedula_identidad" name="cedula_identidad" value="{{old('cedula_identidad',$cliente->persona->cedula_identidad)}}">
                    @error('cedula_identidad')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="celular">Telefono:</label>
                    <input type="tel" id="celular" name="celular" value="{{old('celular',$cliente->persona->celular)}}">
                    @error('celular')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="email">Correo electronico:</label>
                    <input type="text" id="email" name="email" value="{{old('email',$cliente->persona->email)}}">
                    @error('email')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="sexo">Genero:</label>
                    @if ($cliente->persona->sexo[0]=='H')
                    <label>Hombre <input type="radio" name="sexo" value="H" checked></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" ></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @endif
                    @if ($cliente->persona->sexo[0]=='M')
                    <label>Hombre <input type="radio" name="sexo" value="H" ></label>    
                    <label>Mujer <input type="radio" name="sexo" value="M" checked></label>
                    <label>Otro <input type="radio" name="sexo" value="U" ></label>
                    @endif
                    @if ($cliente->persona->sexo[0]=='U')
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
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$cliente->persona->fecha_nacimiento)}}">
                    @error('fecha_nacimiento')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section class="formulario-datos__seccion">
            <h2 class="formulario-datos__seccion-titulo">Datos de cliente</h2>
            <div class="formulario-datos__input-list">
                <div class="formulario-datos__input">
                    <label for="telefono_cliente">Telefono:</label>
                    <input type="tel" id="telefono_cliente" name="telefono_cliente" value="{{old('telefono_cliente',$cliente->telefono)}}">
                    @error('telefono_cliente')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="lugar_trabajo">Lugar de trabajo:</label>
                    <input type="text" id="lugar_trabajo" name="lugar_trabajo" value="{{old('lugar_trabajo',$cliente->lugar_trabajo)}}">
                    @error('lugar_trabajo')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="telefono_trabajo">Telefono trabajo:</label>
                    <input type="tel" id="telefono_trabajo" name="telefono_trabajo" value="{{old('telefono_trabajo',$cliente->telefono_trabajo)}}">
                    @error('telefono_trabajo')
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
                    <input type="text" id="correo_usuario" name="correo_usuario" value="{{old('correo_usuario',$cliente->persona->user->email)}}">
                    @error('correo_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
                <div class="formulario-datos__input">
                    <label for="password_usuario">Contraseña:</label>
                    <input type="text" id="password_usuario" name="password_usuario" value="{{old('password_usuario',$cliente->persona->user->password)}}">
                    @error('password_usuario')
                    <br><small class="formulario-datos__mensaje-error">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </section>
        <div class="formulario-datos__opciones">
            @can('cliente.update')
            <button type="submit">Guardar cambios</button>    
            @endcan
            @can('cliente.index')
            <a href="{{ route('cliente.index') }}">Cancelar</a>    
            @endcan
            
        </div>
    </form>
</section>
@endsection