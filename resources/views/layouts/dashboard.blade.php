<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href='/style/app.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;400;600;700&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <div class="dashboard-grid">
        <header class="menu-superior">
            @auth
            <span>{{Auth::user()->persona->nombre}}</span>
            @endauth
            
            <form style="display: inline" action="{{route('logout')}}" method="POST">
                @csrf
                <button>salir</button>
            </form>
        </header>
        <aside class="menu-lateral">
            <div class="menu-lateral__titulo">
                <a href="{{ route('home') }}" >
                    Service-Man
                </a>
            </div>
            <div class="menu-lateral__opciones">
                @can('administrador.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{ route('administrador.index') }}" >
                        Administradores
                    </a>
                </div>
                @endcan
                @can('cliente.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{ route('cliente.index') }} ">
                        Clientes
                    </a>
                </div>    
                @endcan
                
                @can('trabajador.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{ route('trabajador.index') }}" >
                        Trabajadores
                    </a>
                </div>
                @endcan
                
                @can('turno.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{ route('turno.index') }}" >
                        Turnos
                    </a>
                </div>
                @endcan
                
                @can('contrato.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{ route('contrato.index') }}" >
                        Contratos
                    </a>
                </div>
                @endcan
                
                @can('servicio.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{ route('servicio.index') }}" >
                        Servicios
                    </a>
                </div>
                @endcan
                
                @can('solicitud.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{route('solicitud.index')}}" >
                        Solicitud de servicios
                    </a>
                </div>
                @endcan
                
                @can('orden.index')
                <div class="menu-lateral__opcion-item" >
                    <a href="{{route('orden.index')}}" >
                        Orden de trabajo
                    </a>
                </div>
                @endcan
                
            </div>
        </aside>
        <main class="contenedor-principal">
            @yield('contenedor-principal')
        </main>
    </div>
</body>
</html>