<section id="features" class="section section-center  section-features">
    <div class="container">
        <h1 class="section-title"><span>@lang('web.blog.title')</span></h1>
        <div class="row wow bounceInUp text-left">
            @foreach($blogPosts as $post)
                <div class="col-md-4 premium-course">
                    <div class="premium-card">
                        <div class="premium-color color-docker"></div>
                        <div class="premium-info">
                            <header>
                                <h3><a href="{{ $post->get_permalink() }}">{{ $post->get_title() }}</a></h3>
                                <time>{{ $post->get_date('j F Y | g:i a') }}</time>
                            </header>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>