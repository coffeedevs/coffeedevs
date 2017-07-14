@extends('layouts.errors')
@section('content')
    @component('components.error')
        @slot('title')
            ERROR 500 - Internal Server error
        @endslot
        <p>El servicio no está disponible <b>en este momento</b>, intenta de nuevo más tarde</p>
    @endcomponent
@endsection