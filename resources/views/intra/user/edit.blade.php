@extends('layouts.adminlte')

@section('header')
    Usuários
@endsection

@section('content')
    <form action="/intra/user/update/{{ $user->id }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="row">
            <div class="col col-8">
                <label for="name" class="">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="col col-4">
                <label for="cpf" class="">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $user->cpf }}">
            </div>
            <div class="col col-2">
                <label for="role_id" class="">Cargo</label>
                <select class="form-control" name="role_id" id="role_id">
                    <option value="{{ $user->role->id }}">{{ $user->role->name }}</option>
                    @foreach ($role as $roles)
                        <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-2">
                <label for="operation_id" class="">Operação</label>
                <select class="form-control" name="operation_id" id="operation_id">
                    <option value="{{ $user->operation->id }}">{{ $user->operation->name }}</option>
                    @foreach ($operation as $operations)
                        <option value="{{ $operations->id }}">{{ $operations->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col col-2">
                <label for="is_admin" class="">Tipo</label>

                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="{{ $user->is_admin }}">
                        @if ($user->is_admin == '1')
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
