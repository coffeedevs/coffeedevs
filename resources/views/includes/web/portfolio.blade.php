<section id="portfolio" class="section section-portfolio">
    <div class="container">
        <h1 class="section-title"><span>@lang('web.portfolio.title')</span></h1>
        <ul id="filters">
            <li><a href="#" data-filter="*">@lang('web.portfolio.all')</a></li>
            @foreach($types as $type)
                <li>/</li>
                <li><a href="#" data-filter=".{{ $type->code }}">{{ $type->name }}</a></li>
            @endforeach
        </ul>

        <div class="portfolio-isotope row zoomIn wow">
            @foreach($projects as $project)
                <article class="post col-md-3 col-sm-6 portfolio-item {{ $project->type->code }}">
                    <div class="entry-thumbnail">
                        <a target="_blank" class="hover-effect" data-toggle="modal" data-target="#project-{{ $project->id }}">
                            <img src="{{ $project->actualImage }}" width="400" height="300"
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
                                <button type="button" class="btn btn-block btn-primary"
                                        onclick="window.open('{{ $project->link }}')">Ir al Sitio
                                </button>
                                <ul class="list-unstyled project-info">
                                    <li><strong>Tipo</strong> <span class="pull-right">{{ $project->type->name }}</span></li>
                                    <li><strong>Cliente</strong> <span class="pull-right">{{ $project->client }}</span></li>
                                    <li><strong>Año</strong> <span class="pull-right">{{ $project->pretty_date }}</span></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $project->description }}</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endforeach