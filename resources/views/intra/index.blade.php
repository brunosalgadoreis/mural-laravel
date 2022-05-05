@extends('layout')

@section('cabecalho')
    Mural
@endsection

@section('conteudo')

    <div class="row m-2 d-flex align-items-center justify-content-between">
        <div class="">
            <h4><b>{{ $user->nome }}</b></h4>
        </div>
        <div class="d-flex">
            <div class="p-1 m-1 bg-info text-white rounded-pill"> {{ $user->cargo->nome }}</div>
            <div class="p-1 m-1 bg-secondary text-white rounded-pill">{{ $user->operacao->nome }}</div>
        </div>
    </div>

    <hr />
    <ul class="list-group">
        @foreach ($mural as $murals)
            <div class="">
                <li class="list-group-item mb-2">

                    <div class="row ml-2 d-flex align-items-center justify-content-between">
                        <div class="">
                            <h4><b>{{ $murals->titulo }}</b></h4>
                        </div>
                        <div class="d-flex">
                            <div class="p-1 m-1"> {{ $murals->user->nome }}</div>
                            <div class="p-1 m-1 bg-info text-white rounded-pill"> {{ $murals->cargo->nome }}</div>
                            <div class="p-1 m-1 bg-secondary text-white rounded-pill">{{ $murals->operacao->nome }}</div>
                        </div>
                    </div>
                    <hr />
                    <div class="row ml-2">
                        {{ $murals->post }}
                    </div>
                </li>
            </div>
        @endforeach
    </ul>

@endsection
