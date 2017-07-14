@extends('layouts.errors')
@section('content')
    @component('components.error')
        @slot('title')
            ERROR 401 - Unauthorized
        @endslot
        <p class="lead">No puedes acceder al contenido. Prueba <a href="{{ url('login') }}">iniciando sesión</a></p>
    @endcomponent
@endsection