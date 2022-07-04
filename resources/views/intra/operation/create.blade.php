@extends('layouts.adminlte')

@section('username')
{{ $authuser->name }}
@endsection

@section('photo')
    {{ $authuser->photo }}
@endsection

@section('header')
    Operação
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
                    <div class="col col-12 d-flex justify-content-between align-items-center">
                        <label for="name" class="">Nome</label>
                        <input type="text" class="form-control ml-1 mr-1" name="name" id="name">
                        <button class="btn btn-primary ml-1">Adicionar</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    @include('intra.mensagem', ['mensagem' => $mensagem])
    <hr />

    @foreach ($operation as $operations)
        <div class="card">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $operations->name }}<br />
                <form method="post" action="/intra/operation/{{ $operations->id }}"
                    onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        </div>
    @endforeach
@endsection
