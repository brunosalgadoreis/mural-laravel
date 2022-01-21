@extends('layout')

@section('cabecalho')
    Cargo
@endsection

@section('conteudo')

    <form method="post">
        @csrf
        <div class="row mb-2">
            <div class="col col-8 d-flex justify-content-between align-items-center">
                <label for="nome" class="mr-1">Nome</label>
                <input type="text" class="form-control ml-1 mr-1" name="nome" id="nome">
                <button class="btn btn-primary ml-1">Adicionar</button>
            </div>
        </div>


    </form>
    @include('intra.mensagem', ['mensagem' => $mensagem])

    <ul class="list-group mt-4">
        @foreach ($cargo as $cargos)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $cargos->nome }}<br />
                <form method="post" action="/intra/cargo/{{ $cargos->id }}" onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>


@endsection
