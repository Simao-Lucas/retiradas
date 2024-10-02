@extends('main')

@section('content')

    Bem vindo a Secretaria de Pós Graduação!<br>
    <br><br>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <a href="/escolheDoc" type="submit" class="btn btn-primary">Retirar meu documento</a>
            <a href="/identificaInteressado" type="submit" class="btn btn-primary">Retirar documento de outra pessoa</a>
        </div>
    </div>


@endsection('content')