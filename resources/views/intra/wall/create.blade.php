@extends('layouts.adminlte')

@section('header')
    Mural
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Postar</h3>
        </div>
        <div class="row m-2 d-flex align-items-center justify-content-between">
            <div class="">
                <h4 class="m-0">Olá <b>{{ $authuser->name }}</b></h4>
            </div>
            <div class="d-flex">
                Cargo: <div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $authuser->role->name }}</div>
                Operação: <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">{{ $authuser->operation->name }}
                </div>
            </div>
        </div>

        <hr class="mt-0" />

        <form method="post">
            @csrf
            <div class="row card-body">
                <div class="col col-8">
                    <label for="title" class="">Título</label>
                    <input type="text" class="form-control" name="title" id="title">
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
                <input type="hidden" name="user_id" id="user_id" value="{{ $authuser->id }}">
                <div class="col col-12">
                    <label for="post" class="">Postagem</label>
                    <textarea type="text" class="form-control" name="post" id="post"></textarea>
                    <button class="btn btn-primary mt-2">Adicionar</button>
                </div>

            </div>
        </form>
    </div>

    <hr />

    @foreach ($wall as $walls)
        <div class="card card-primary">
            <div class="row mx-2 d-flex align-items-center justify-content-between">
                <div>
                    <h4><b>{{ $walls->title }}</b></h4>
                </div>
                <div class="d-flex">
                    <div class="p-1 m-1 badge"> {{ $walls->user->name }}</div>
                    <div class="p-1 m-1 text-white rounded-pill badge badge-info"> {{ $walls->role->name }}</div>
                    <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">{{ $walls->operation->name }}
                    </div>
                </div>
            </div>

            <hr class="mt-0" />

            <div class="row ml-2 d-flex align-items-center justify-content-between">
                {{ $walls->post }}
                <form method="post" action="/intra/wall/{{ $walls->id }}" onsubmit="return confirm('Deseja remover?')">
                    <div class="m-3">
                        @csrf
                        <button class="btn btn-primary btn-sm">Editar</button>
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
