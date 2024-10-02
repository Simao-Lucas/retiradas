@extends('main')

@section('content')

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <a href="/login/senhaunica" type="submit" class="btn btn-primary">Login com senha única</a>
            <a href="/cadastranusp" type="submit" class="btn btn-primary">Autenticação sem senha única<br> <small>(para ex-alunos quenão possuem mais acesso)</a>
        </div>
    </div>


@endsection('content')