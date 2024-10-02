@extends('main')

@section('content')

    <form method="POST" action="/identificaInteressado">
    @csrf
    
    Número USP do interessado:
    <input type="text" name="codpes" value="" required><br>
    <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>

@endsection