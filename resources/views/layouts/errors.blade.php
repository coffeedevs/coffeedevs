<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error @yield('error') - CoffeeDevs</title>
    @include('includes.web.styles')
    <style>
        body {
            background-color: #0695d6;
        }

        .card {
            background-color: white;
            color: #767676;
            padding: 2em;
            margin: 2em;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="flex-center" style="height:100vh">
    @yield('content')
</div>
@include('includes.web.scripts')
</body>
</html>