@extends('layouts.login')

@section('header')
    Login
@endsection

@section('content')

    @include('intra.erros', ['errors' => $errors])

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Login</h3>
    </div>
    <form method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" required
                    placeholder="Entre com CPF">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required min="1"
                    placeholder="Senha">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="register"><button type="button" class="btn btn-primary">Registrar</button></a>
        </div>
    </form>
</div>
@endsection
