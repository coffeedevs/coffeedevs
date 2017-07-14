<header id="header" class="site-header">
    <nav id="navbar" class="site-navbar navbar navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <h1 class="navbar-brand"><i class="fa fa-coffee"></i> <a href="{{ url('/') }}">CoffeeDevs</a></h1>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul id="navigation" class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#header" class="current">Home</a></li>
                    <li><a href="/#features" class="smooth-scroll">@lang('web.features.title')</a></li>
                    <li><a href="/#portfolio" class="smooth-scroll">@lang('web.portfolio.title')</a></li>
                    <li><a href="/services" class="linkable">@lang('web.services.title')</a></li>
                    <li><a href="/#contact" class="smooth-scroll">@lang('web.contact.cta')</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="external linkable" href="http://blog.coffeedevs.com/">@lang('web.blog.cta')</a></li>
                    @if(config('app.locale') == 'es')
                        <li><a href="{{ route('web.locale', 'en') }}">EN</a></li>
                    @else
                        <li><a href="{{ route('web.locale', 'es') }}">ES</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>