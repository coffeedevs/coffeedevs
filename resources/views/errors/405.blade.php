@extends('layouts.errors')
@section('content')
    @component('components.error')
        @slot('title')
            ERROR 405 - Method not allowed
        @endslot
        <p class="lead">No puedes ejecutar ese método en esta dirección</p>
    @endcomponent
@endsection