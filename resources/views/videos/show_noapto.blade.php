@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.public')
@section('content')
    <h1 class="d-flex align-bottom justify-content-center text-danger mt-2 mb-2 mx-auto p-2">Este video no esta disponible para usted por el motivo de: {{$motivo}}</h1>
    <?php if(!Auth::check()){ ?>
        <form class="d-flex form-inline align-bottom justify-content-center mt-2 mb-2 mx-auto p-2" action="{{route('login')}}" method="GET" >
            <button class="form-inline align-bottom justify-content-center mt-2 mb-2 mx-auto p-2" type="submit">Iniciar Sesion</button>
        </form>
    <?php } ?>
@endsection
