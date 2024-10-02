@extends('main')

@section('content')

    Insira seu número usp, usado durante sua pós graduação.
    <br><br>

    <form method="POST" action="/cadastranusp">
    @csrf
    @method('patch')

    Número USP: <input type="text" name="codpes" value="">
    <br><br>
    <button type="submit" class="btn btn-primary"> Confirmar </button>


    </form>

@endsection