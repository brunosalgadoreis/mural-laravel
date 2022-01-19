@extends('layout')

@section('cabecalho')
    Usuários
@endsection

@section('conteudo')

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome" class="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="col col-4">
                <label for="cpf" class="">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf">
            </div>
            <div class="col col-2">
                <label for="cargo_id" class="">Cargo</label>
                <input type="text" class="form-control" name="cargo_id" id="cargo_id">
            </div>
            <div class="col col-2">
                <label for="operacao_id" class="">Operação</label>
                <input type="text" class="form-control" name="operacao_id" id="operacao_id">
            </div>
            <div class="col col-2">
                <label for="tipo" class="">Tipo</label>
                <input type="number" class="form-control" name="tipo" id="tipo">
            </div>
            <div class="col col-2">
                <label for="senha" class="">Senha</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="col col-4">
                <label for="email" class="">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>


    <ul class="list-group">
        @foreach ($user as $users)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $users->nome }}<br />
                <form method="post" action="#" onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>


@endsection
