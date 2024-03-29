@extends('layouts.adminlte')

@section('username')
{{ $authuser->name }}
@endsection

@section('photo')
    {{ $authuser->photo }}
@endsection

@section('header')
    Cargos
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cadastrar</h3>
        </div>
        <form method="post">
            @csrf
            <div class="card-body">
                <div class="row ">
                    <div class="col col-12 d-flex justify-content-between align-items-center">
                        <label for="name" class="ml-1">Nome</label>
                        <input type="text" class="form-control ml-1 mr-1" name="name" id="name">
                        <button class="btn btn-primary ml-1">Adicionar</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @include('intra.mensagem', ['mensagem' => $mensagem])
    <hr />

    @foreach ($role as $roles)
        <div class="card">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $roles->name }}<br />
                <form method="post" action="/intra/role/{{ $roles->id }}" onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        </div>
    @endforeach
@endsection
