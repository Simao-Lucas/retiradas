@extends('main')

@section('content')

    A ideia aqui é coletar a assinatura do receptor.
    <br><br>

    <form method="POST" action="/login/semsenha">
    @csrf
    @method('patch')

    <select name = "autenticacao">
        <option value="Assinatura"> Assinatura </option>
    </select>
    <br><br>
    <button type="submit" class="btn btn-primary"> Confirmar </button>


    </form>

@endsection