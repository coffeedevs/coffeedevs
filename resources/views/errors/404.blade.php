@extends('layouts.errors')
@section('content')
    @component('components.error')
        @slot('title')
            ERROR 404 - Not Found
        @endslot
        <p>El enlace solicitado no existe o ha cambiado.
            <br>
            Puedes volver al <a href="/">Home</a> o a la <a href="{{ URL::previous() }}">página anterior</a>
         </p>
    @endcomponent
@stop