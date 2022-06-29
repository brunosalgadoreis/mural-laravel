@extends('layouts.adminlte')

@section('header')
    Usuários
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastrar</h3>
        </div>
        <form method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col col-8">
                        <label for="name" class="">Nome</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col col-4">
                        <label for="cpf" class="">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf">
                    </div>
                    <div class="col col-2">
                        <label for="role_id" class="">Cargo</label>
                        <select class="form-control" name="role_id" id="role_id">
                            @foreach ($role as $roles)
                                <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-2">
                        <label for="operation_id" class="">Operação</label>
                        <select class="form-control" name="operation_id" id="operation_id">
                            @foreach ($operation as $operations)
                                <option value="{{ $operations->id }}">{{ $operations->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-2">
                        <label for="is_admin" class="">Tipo</label>
                        <select class="form-control" name="is_admin" id="is_admin">
                            <option value="1">ADM</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="col col-2">
                        <label for="password" class="">Senha</label>
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
    </div>
    <hr />

    @foreach ($user as $users)
        <div class="card">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $users->name }}
                <div class="d-flex">
                    <div class="p-1 m-1 bg-info text-white rounded-pill">{{ $users->role->name }}</div>
                    <div class="p-1 m-1 bg-secondary text-white rounded-pill">{{ $users->operation->name }}</div>
                </div>
                <br />
                <div class="d-flex">
                    <a href="/intra/user/edit/{{ $users->id }}" class="btn btn-primary">Editar</a>
                    <form method="post" action="/intra/user/{{ $users->id }}"
                        onsubmit="return confirm('Deseja remover?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger ml-1">Excluir</button>
                    </form>
                </div>
            </li>
        </div>
    @endforeach
@endsection
