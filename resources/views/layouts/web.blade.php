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

    @section('styles')
        @include('includes.web.styles')
    @show
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