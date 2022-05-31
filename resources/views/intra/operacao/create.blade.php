@extends('layouts.adminlte')

@section('cabecalho')
    Operação
@endsection

@section('conteudo')
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex border">
            <a href="/intra/mural" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Mural</a>
            <a href="/intra/cargo" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Cargos</a>
            <a href="/intra/operacao" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Operação</a>
            <a href="/intra/user" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Usuários</a>
        </nav>-->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastrar</h3>
        </div>
        <form method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col col-12 d-flex justify-content-between align-items-center">
                        <label for="nome" class="">Nome</label>
                        <input type="text" class="form-control ml-1 mr-1" name="nome" id="nome">
                        <button class="btn btn-primary ml-1">Adicionar</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @include('intra.mensagem', ['mensagem' => $mensagem])
    <hr />

    @foreach ($operacao as $operacoes)
        <div class="card">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $operacoes->nome }}<br />
                <form method="post" action="/intra/operacao/{{ $operacoes->id }}"
                    onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        </div>
    @endforeach
@endsection
