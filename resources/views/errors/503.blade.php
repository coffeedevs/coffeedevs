@extends('layouts.errors')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            <h1></h1>
        </div>
        <div class="card-body card-padding">
        </div>
    </div>
@endsection

@extends('layouts.errors')
@section('content')
    @component('components.error')
        @slot('title')
            ERROR 503 - Service Unavailable
        @endslot
        <p>El servicio no está disponible <b>en este momento</b>, intenta de nuevo más tarde</p>
    @endcomponent
@endsection