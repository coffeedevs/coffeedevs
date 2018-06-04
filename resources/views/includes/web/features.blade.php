<section id="features" class="section section-center  section-features">
    <div class="container">
        <h1 class="section-title"><span>@lang('web.features.title')</span></h1>

        <div class="row wow bounceInUp text-left">

            {{--@foreach(range(1,6) as $index => $features)--}}
            {{--<div class="col-md-4 col-sm-6">--}}
            {{--<h2>@lang('web.features.' . $index . '.title')</h2>--}}
            {{--<div class="feature-divider"></div>--}}
            {{--<p>@lang('web.features.' . $index . '.text')</p>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            <div class="col-md-4">
                <div class="service">
                    <div class="service-icon">
                        <i class="icon icon-home-service-custom-development"></i>
                    </div>
                    <h2>Custom Software Development</h2>
                    Whether you are a start-up or an established business, we are ready to assist you at every stage of the software development life cycle — from
                    conceptualization and consulting to development and support.
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <div class="service-icon">
                        <i class="icon icon-home-service-web-development"></i>
                    </div>
                    <h2>Web Application Development</h2>
                    Our software engineers have a wealth of experience in building web applications. We are also experts in many verticals and business domains, including
                    e-Commerce, e-Learning, AdTech, Finance, Entertainment, and more.
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <div class="service-icon">
                        <i class="icon icon-home-service-mobile-development"></i>
                    </div>
                    <h2>Mobile Application Development</h2>
                    Develop powerful, highly usable mobile apps that solve business problems, attract users, and rein­force your brand. We build native, hybrid, and
                    cross-platform apps that run on all major operating systems such as iOS and Android.
                </div>
            </div>
        </div>

        <a href="#contact" class="btn btn-primary ui-btn-lg smooth-scroll" style="margin:2rem 0;">@lang('web.features.cta')</a>

    </div>
</section>
