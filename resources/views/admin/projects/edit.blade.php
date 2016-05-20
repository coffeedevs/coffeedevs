@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8">
        @include('includes.admin.messages')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> Editar <b>Portfolio</b></h3>
            </div>
                        <form role="form" method="post" enctype="multipart/form-data"
                  action="{{route('admin.projects.update',['id'=>$project->id])}}">
                <input name="_method" type="hidden" value="PUT">
                @include('admin.projects.includes.fields')
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('scripts')
@parent
@include('admin.projects.includes.scripts')
@stop
