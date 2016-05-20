<section id="portfolio" class="section section-portfolio">
    <div class="container">
        <h1 class="section-title"><span>Nuestros Trabajos</span></h1>
        <ul id="filters">
            <li><a href="#" data-filter="*">Todos</a></li>
            <li>/</li>
            <li><a href="#" data-filter=".web">Desarrollo Web</a></li>
            <li><a href="#" data-filter=".plataforma">Plataforma Online</a></li>
            <li><a href="#" data-filter=".mp">Integración MercadoPago</a></li>
        </ul>

        <div class="portfolio-isotope row zoomIn wow">
            @foreach($projects as $project)
                <article class="post col-md-3 col-sm-6 portfolio-item web">
                    <div class="entry-thumbnail">
                        <a target="_blank" class="hover-effect" data-toggle="modal" data-target="#project-1">
                            <img src="{{ asset("images/projects/$project->id.png") }}" width="400" height="300"
                                 alt="Desarrollo Web"/>
                            <span class="overlay"><i class="fa fa-plus"></i></span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@foreach($projects as $project)
    <div class="modal fade" id="project-{{ $project->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="modal-title" id="project-modal-label">{{ $project->title }}</h2>
                </div>
                <div class="modal-body">
                    <article class="single-project">
                        <div class="row">
                            <div class="col-md-4">
                                @foreach($project->links() as $link)
                                    <button type="button" class="btn btn-block btn-primary"
                                            onclick="window.open('{{ $link->url }}')">Ir al Sitio
                                    </button>
                                @endforeach
                                <ul class="list-unstyled project-info">
                                    <li><strong>Type</strong> <span class="pull-right"><?= $tipo[$i] ?></span></li>
                                    <li><strong>Client</strong> <span class="pull-right"><?= $cliente[$i] ?></span></li>
                                    <li><strong>Year</strong> <span class="pull-right"><?= $anio[$i] ?></span></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <p><?= $descripcion[$i] ?></p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endforeach