<section id="contact" class="section section-center section-contact">
    <div class="container">
        <h1 class="section-title">
            <span id="span-consulta">@lang('web.contact.title')</span>
        </h1>
        <div class="row">
            <div class="elegir-contacto col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                @lang('web.contact.subtitle')
            </div>
        </div>
        <div class="contacto-simple" id="contacto-simple">
            <div class="main-action">
                <form id="formulario-contacto-simple" action="{{ route('web.mail') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
                                <label class="sr-only">@lang('web.contact.form.subject')</label>
                                <input type="text" name="asunto" class="form-control" placeholder="@lang('web.contact.form.subject')" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">@lang('web.contact.form.name')</label>
                                <input type="text" name="nombre" class="form-control" placeholder="@lang('web.contact.form.name')" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">@lang('web.contact.form.email')</label>
                                <input type="email" name="email" class="form-control" placeholder="@lang('web.contact.form.email')" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">@lang('web.contact.form.message-title')</label>
                                <textarea class="form-control" name="consulta"
                                          placeholder="@lang('web.contact.form.message')"
                                          style="height: 100px" rows="6" required></textarea>
                            </div>
                            <div aria-hidden="true" style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
                                <label for="contact-website">Website</label>
                                <input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-action="contact"></div>
                            </div>
                        </div>
                    </div>
                    <p id="contact-error" class="text-danger" style="display: none;">@lang('web.contact.form.error')</p>
                    <button type="submit" name="contacto-simple" class="btn btn-primary">@lang('web.contact.form.cta')</button>
                </form>
            </div>
        </div>
    </div>
</section>
