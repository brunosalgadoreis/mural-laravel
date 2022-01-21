@extends('layout')

@section('cabecalho')
    Mural
@endsection

@section('conteudo')

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex border">
        <a href="/intra/cargo" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Cargos</a>
        <a href="/intra/operacao" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Operação</a>
        <a href="/intra/user" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Usuários</a>
    </nav>

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="titulo" class="">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo">
            </div>
            <div class="col col-2">
                <label for="cargo_id" class="">Cargo</label>
                <input type="text" class="form-control" name="cargo_id" id="cargo_id">
            </div>
            <div class="col col-2">
                <label for="operacao_id" class="">Operação</label>
                <input type="text" class="form-control" name="operacao_id" id="operacao_id">
            </div>
            <div class="col col-12">
                <label for="post" class="">Postagem</label>
                <textarea type="text" class="form-control" name="post" id="post"></textarea>
            </div>

        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>


    <ul class="list-group mt-4">
        @foreach ($mural as $murals)
            <li class="list-group-item d-flex justify-content-between align-items-center mt-1 mb-1">
                {{ $murals->titulo }}&nbsp&nbsp&nbsp{{ $murals->cargo->nome }}&nbsp&nbsp&nbsp
                {{ $murals->operacao->nome }}
                <br />
                {{ $murals->post }}

                <form method="post" action="#" onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection
