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
                        <div class="col-sm-6">
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
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="sr-only">@lang('web.contact.form.message-title')</label>
                                <textarea class="form-control" name="consulta"
                                          placeholder="@lang('web.contact.form.message')"
                                          style="height: 100px" rows="6" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LceiA8TAAAAAIy5iClIsWXeXKugFm4kOOTshoI3"></div>
                    <button type="submit" name="contacto-simple" class="btn btn-primary">@lang('web.contact.form.cta')</button>
                </form>
            </div>
        </div>
    </div>
</section>
