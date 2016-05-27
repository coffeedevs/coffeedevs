<section id="contact" class="section section-center section-contact">
    <div class="container">
        <h2 class="section-title"><span id="span-consulta">Hacenos tu consulta!</span></h2>
        <div class="row">
            <div class="elegir-contacto col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                Envianos tu consulta y te contestamos en seguida!
            </div>
        </div>
        <div class="contacto-simple" id="contacto-simple">
            <div class="main-action">
                <form id="formulario-contacto-simple" action="{{ route('web.mail') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="sr-only">Asunto</label>
                                <input type="text" name="asunto" class="form-control" placeholder="Asunto" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="sr-only">Tu consulta</label>
                                <textarea class="form-control" name="consulta"
                                          placeholder="Contanos un poco de tu proyecto o idea y qué crees que necesitas"
                                          style="height: 100px" rows="6" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LceiA8TAAAAAIy5iClIsWXeXKugFm4kOOTshoI3"></div>
                    <button type="submit" name="contacto-simple" class="btn btn-primary">Enviar!</button>
                </form>
            </div>
        </div>
    </div>
</section>
