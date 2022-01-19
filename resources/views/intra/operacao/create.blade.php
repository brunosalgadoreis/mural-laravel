@extends('layout')

@section('cabecalho')
    Operação
@endsection

@section('conteudo')

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome" class="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
    <ul class="list-group">
        @foreach ($operacao as $operacoes)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $operacoes->nome }}<br />
                <form method="post" action="#" onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>


@endsection
