<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="box-body">
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" id="title" name="title"
               placeholder="Titulo" value="@if(!empty($project)){{$project->title}}@else{{old('title')}}@endif">
    </div>
    <div class="form-group">
        <label for="title">Link</label>
        <input type="text" class="form-control" id="link" name="link"
               placeholder="Link" value="@if(!empty($project)){{$project->link}}@else{{old('link')}}@endif">
    </div>
    <div class="form-group">
        <label for="type">Tipo</label>
        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"
                aria-hidden="true" name="type_id">
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="client">Cliente</label>
        <input type="text" class="form-control" id="client" name="client"
               placeholder="Cliente" value="@if(!empty($project)){{$project->client}}@else{{old('client')}}@endif">
    </div>
    <div class="form-group">
        <label for="date">Fecha</label>
        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="date">
            @for($i = \Carbon\Carbon::now()->year; $i >= 2015;  $i--)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <input type="text" class="form-control" id="description" name="description"
               placeholder="Descripción"
               value="@if(!empty($project)){{ $project->description }}@else{{ old('description') }}@endif">
    </div>
    <div class="form-group">
        <label for="image">Imagen</label>

        <div class="fileinput fileinput-new image" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;">
                @if(!empty($project))
                    <img src="{{ $project->actualImage }}"/>
                @else
                    <img src="{{ asset('images/placeholder-image.png') }}"/>
                @endif
            </div>
            <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Seleccionar</span>
                <span class="fileinput-exists">Cambiar</span>
                <input type="file" id="image" name="image">
            </span>
                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Eliminar</a>
            </div>
        </div>
    </div>
</div>