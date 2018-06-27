<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeeDevs - Desarrollo Web</title>
    <meta name="description"
          content="Desarrollo de aplicaciones web, sitios institucionales e E-Commerce. Dale a tu negocio o marca la presencia digital que se merece!">
    <meta name="author" content="CoffeeDevs">

    <meta property="og:title" content="Desarrollo de aplicaciones web y mobile"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://coffeedevs.com/"/>
    <meta property="og:image" content="http://coffeedevs.com/images/portada2.jpg"/>
    <meta property="og:description"
          content="Desarrollo de aplicaciones web, sitios institucionales e E-Commerce. Dale a tu negocio o marca la presencia digital que se merece!"/>

    <link rel="dns-prefetch" href="//www.google.com">
    <link rel="dns-prefetch" href="//coffeedevs.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//www.gstatic.com">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    @section('styles')
        @include('includes.web.styles')
    @show
    @include('includes.web.analytics')
</head>
<body>
<div id="page">
    @section('header')
        @include('includes.web.header')
    @show

    <main id="main" class="site-main">
        @yield('content')
    </main>

    @section('footer')
        @include('includes.web.footer')
    @show
</div>
@section('scripts')
    @include('includes.web.scripts')
@show
</body>
</html>