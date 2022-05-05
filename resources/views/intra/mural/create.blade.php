@extends('layout')

@section('cabecalho')
    Mural
@endsection

@section('conteudo')
    <div class="row m-2 d-flex align-items-center justify-content-between">
        <div class="">
            <h4><b>{{ $user->nome }}</b></h4>
        </div>
        <div class="d-flex">
            <div class="p-1 m-1 bg-info text-white rounded-pill">{{ $user->cargo->nome }}</div>
            <div class="p-1 m-1 bg-secondary text-white rounded-pill">{{ $user->operacao->nome }}</div>
        </div>
    </div>

    <hr />
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex border">
        <a href="/intra/mural" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Mural</a>
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

                <select class="form-control" name="cargo_id" id="cargo_id">
                    @foreach ($cargo as $cargos)
                        <option value="{{ $cargos->id }}">{{ $cargos->nome }}</option>
                    @endforeach
                </select>
                <!--<input type="text" class="form-control" name="cargo_id" id="cargo_id">-->
            </div>
            <div class="col col-2">
                <label for="operacao_id" class="">Operação</label>

                <select class="form-control" name="operacao_id" id="operacao_id">
                    @foreach ($operacao as $operacaos)
                        <option value="{{ $operacaos->id }}">{{ $operacaos->nome }}</option>
                    @endforeach
                </select>
                <!--<input type="text" class="form-control" name="operacao_id" id="operacao_id">-->
            </div>
            <input type="hidden" name="usuario_id" id="usuario_id" value="{{$user->id}}">
            <div class="col col-12">
                <label for="post" class="">Postagem</label>
                <textarea type="text" class="form-control" name="post" id="post"></textarea>
            </div>

        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>

    <hr />
    <ul class="list-group mt-4">
        @foreach ($mural as $murals)
            <div>
                <li class="list-group-item mb-2">
                    <div class="row ml-2 d-flex align-items-center justify-content-between">
                        <div>
                            <h4><b>{{ $murals->titulo }}</b></h4>
                        </div>
                        <div class="d-flex">
                            <div class="p-1 m-1"> {{ $murals->user->nome }}</div>
                            <div class="p-1 m-1 bg-info text-white rounded-pill"> {{ $murals->cargo->nome }}</div>
                            <div class="p-1 m-1 bg-secondary text-white rounded-pill">{{ $murals->operacao->nome }}</div>
                        </div>
                    </div>

                    <hr />
                    <div class="row ml-2 d-flex align-items-center justify-content-between">
                        {{ $murals->post }}
                        <form method="post" action="/intra/mural/{{ $murals->id }}"
                            onsubmit="return confirm('Deseja remover?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-2">Excluir</button>
                        </form>
                    </div>
                    
                </li>
        @endforeach
    </ul>
@endsection
