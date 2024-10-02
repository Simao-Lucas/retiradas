@extends('main')

@section('content')

    Para prosseguir, escolha os itens a serem retirados:
    <br><br>

    <form method="post" action="/escolheDoc/terceiro/">
    @csrf
    @include('retiradas.partials.form')
    </form>

@endsection