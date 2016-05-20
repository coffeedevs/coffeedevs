@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            @include('includes.admin.messages')
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Agregar <b>Proyecto</b></h3>
                </div>
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{route('admin.projects.store')}}">
                    @include('admin.projects.includes.fields')
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cargar</button>
                        <button type="submit" class="btn btn-info"
                                formaction="{{ route('admin.projects.store') . "?continue=true" }}">
                            Cargar y seguir
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
@stop

@section('scripts')
    @parent
    @include('admin.projects.includes.scripts')
@stop
