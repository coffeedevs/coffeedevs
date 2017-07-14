@extends('layouts.errors')
@section('content')
    @component('components.error')
        @slot('title')
            ERROR 403 - Forbidden
        @endslot
        <p class="lead">No tienes <b>permiso</b> para entrar a éste módulo</p>
    @endcomponent
@endsection