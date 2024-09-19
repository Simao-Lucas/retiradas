@extends('main')

@section('content')

    Bem vindo a Secretaria de Pós Graduação!<br>
    Identifique-se para retirar o documento ou cartão.
    <br><br>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <a href="/login/senhaunica" type="submit" class="btn btn-primary">Login com senha única</a>
            <a href="/login/senhaunica" type="submit" class="btn btn-primary">Indentificação com NUSP<br><small>(Para ex-alunos sem acesso a senha única)</a>
            <a href="/login/senhaunica" type="submit" class="btn btn-primary">Retirar para outra pessoa</a>
        </div>
    </div>


@endsection('content')