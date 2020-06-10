<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <script src="https://kit.fontawesome.com/fe788d2413.js" crossorigin="anonymous"></script>

    <div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>    
    </div>
    @if(!empty($mensagem))
<div class="alert alert-success" role="alert">
{{$mensagem}}
</div>
@endif
       @yield('conteudo')
    </div>
</body>
</html>