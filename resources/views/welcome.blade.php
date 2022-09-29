<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='/style/app.css'>
        <title>Laravel</title>
        </style>
    </head>
    <body>
        <a href={{ route('home') }}>Dashboard</a>
        <a href={{ route('login') }}>login</a>
    </body>
</html>
