@extends('main')

@section('content')
    <form method="POST" action="/idTerceiro">
    @csrf
    @method('patch')

    Nome completo:
    <input type="text" name="nomepes" value=""><br>

    Escolha o tipo de docmento para identificação:
    <select name="tipodocidf" id="doc">
        <option value="CPF">CPF</option>
        <option value="RG">RG</option>
        <option value="Passaporte">Passaporte</option>
        <option value="RNM">RNM</option>
    </select><br>

    Número do documento:
    <input type="text" name="numdocidf" value="">
    <br><br>

    <button type="submit" class="btn btn-primary"> Confirmar </button>

@endsection('content')