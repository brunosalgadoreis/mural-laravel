@extends('layouts.login')

@section('cabecalho')
    Registrar Usuários
@endsection

@section('conteudo')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar</h3>
        </div>
        <form method="post">
            @csrf
            <div class="card-body">
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

                        <select class="form-control" name="cargo_id" id="cargo_id">
                            @foreach ($cargo as $carg)
                                <option value="{{ $carg->id }}">{{ $carg->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-2">
                        <label for="operacao_id" class="">Operação</label>

                        <select class="form-control" name="operacao_id" id="operacao_id">
                            @foreach ($operacao as $operac)
                                <option value="{{ $operac->id }}">{{ $operac->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-2" style="display: none;">
                        <label for="tipo" class="">Tipo</label>

                        <select class="form-control" name="is_admin" id="is_admin">
                            <option value="1">ADM</option>
                            <option value="0" selected>User</option>
                        </select>
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
        
    </div>
@endsection
