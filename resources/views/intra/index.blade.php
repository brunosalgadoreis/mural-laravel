@extends('layout')

@section('cabecalho')
    Mural
@endsection

@section('conteudo')



    <ul class="list-group">
        @foreach ($mural as $murals)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $murals->titulo }}&nbsp&nbsp&nbsp{{ $murals->cargo->nome }}&nbsp&nbsp&nbsp
                {{ $murals->operacao->nome }}
                <br />
                {{ $murals->post }}

                <form method="post" action="#" onsubmit="return confirm('Deseja remover?')">
                    @csrf
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>

@endsection
