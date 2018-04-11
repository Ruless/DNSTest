<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Робота с Excel</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
    </head>
    <body>
        <h3 class="main-title">CRUD form to edit Excel data. Import export</h3>
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Excel data</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}"> Посмотреть все </a></li>
                    <li><a href="{{ route('create') }}">Создать</a>
                    <li><a href="{{ route('import') }}">Импорт</a>
                    <li><a href="{{ route('export') }}">Експорт</a>
                </ul>
            </nav>

            @yield('content')
        </div>
    </body>
</html>
