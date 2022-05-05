@extends('layout')

@section('cabecalho')
    Usuários
@endsection

@section('conteudo')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex border">
        <a href="/intra/mural" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Mural</a>
        <a href="/intra/cargo" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Cargos</a>
        <a href="/intra/operacao" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Operação</a>
        <a href="/intra/user" class="btn btn-primary btn-lg active m-1" role="button" aria-pressed="true">Usuários</a>
    </nav>

    <form action="/intra/user/update/{{ $user->id }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row">
            <div class="col col-8">
                <label for="nome" class="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $user->nome }}">
            </div>
            <div class="col col-4">
                <label for="cpf" class="">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $user->cpf }}">
            </div>
            <div class="col col-2">
                <label for="cargo_id" class="">Cargo</label>

                <select class="form-control" name="cargo_id" id="cargo_id">
                    <option value="{{ $user->cargo->id }}">{{ $user->cargo->nome }}</option>
                    @foreach ($cargo as $carg)
                        <option value="{{ $carg->id }}">{{ $carg->nome }}</option>
                    @endforeach
                </select>

                <!--<input type="text" class="form-control" name="cargo_id" id="cargo_id">-->
            </div>
            <div class="col col-2">
                <label for="operacao_id" class="">Operação</label>

                <select class="form-control" name="operacao_id" id="operacao_id">
                    <option value="{{ $user->operacao->id }}">{{ $user->operacao->nome }}</option>
                    @foreach ($operacao as $operac)
                        <option value="{{ $operac->id }}">{{ $operac->nome }}</option>
                    @endforeach
                </select>

                <!--<input type="text" class="form-control" name="operacao_id" id="operacao_id">-->
            </div>
            <div class="col col-2">
                <label for="tipo" class="">Tipo</label>

                <select class="form-control" name="tipo" id="tipo">
                    <option value="{{ $user->tipo }}">@if ($user->tipo == '1') ADM @else USER @endif</option>
                    <option value="1">ADM</option>
                    <option value="2">User</option>
                </select>
                <!--<input type="number" class="form-control" name="tipo" id="tipo">-->
            </div>
            <div class="col col-4">
                <label for="email" class="">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>

        </div>

        <button class="btn btn-primary mt-2">Atualizar</button>
    </form>
@endsection
