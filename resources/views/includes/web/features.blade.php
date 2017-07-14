<section id="features" class="section section-center  section-features">
    <div class="container">
        <h1 class="section-title"><span>@lang('web.features.title')</span></h1>

        <div class="row wow bounceInUp text-left">

            @foreach(range(1,6) as $index => $features)
                <div class="col-md-4 col-sm-6">
                    <h2>@lang('web.features.' . $index . '.title')</h2>
                    <div class="feature-divider"></div>
                    <p>@lang('web.features.' . $index . '.text')</p>
                </div>
            @endforeach
        </div>

        <a href="#contact" class="btn btn-primary ui-btn-lg smooth-scroll" style="margin:2rem 0;">@lang('web.hero.cta')</a>

    </div>
</section>
