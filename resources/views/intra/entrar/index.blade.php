@extends('layout')

@section('cabecalho')
    Login
@endsection

@section('conteudo')

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>

    </form>



@endsection
