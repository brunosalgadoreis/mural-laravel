@extends('layouts.adminlte')

@section('cabecalho')
    Usuários
@endsection

@section('conteudo')
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
            </div>
            <div class="col col-2">
                <label for="operacao_id" class="">Operação</label>

                <select class="form-control" name="operacao_id" id="operacao_id">
                    <option value="{{ $user->operacao->id }}">{{ $user->operacao->nome }}</option>
                    @foreach ($operacao as $operac)
                        <option value="{{ $operac->id }}">{{ $operac->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-2">
                <label for="tipo" class="">Tipo</label>

                <select class="form-control" name="tipo" id="tipo">
                    <option value="{{ $user->tipo }}">
                        @if ($user->tipo == '1')
                            ADM
                        @else
                            USER
                        @endif
                    </option>
                    <option value="1">ADM</option>
                    <option value="0">User</option>
                </select>
            </div>
            <div class="col col-4">
                <label for="email" class="">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Atualizar</button>
    </form>
@endsection
