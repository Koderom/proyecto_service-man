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
            <span>hola desde el menu superior</span>
            
            <a href={{ route('login') }}>login</a>
        </header>
        <aside class="menu-lateral">
            <div class="menu-lateral__titulo">
                <span>Service-Man</span>
            </div>
            <div class="menu-lateral__opciones">
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
                <span class="menu-lateral__opcion-item">Opcion 1</span>
            </div>
        </aside>
        <main class="contenedor-principal">
            @yield('contenedor-principal')
        </main>
    </div>
</body>
</html>