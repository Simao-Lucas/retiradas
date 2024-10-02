@extends('main')

@section('content')

    A ideia é fazer com que essa página faça o reconhecimento facial do secretário que irá fazer a entrega do documento.
    <br><br>

    <form method="POST" action="/identificaSecretario">
    @csrf
    @method('patch')

    @include('retiradas.partials.seleciona_sec_temp')

    </form>

@endsection