@extends('layouts.adminlte')

@section('cabecalho')
    SimpleWall
@endsection

@section('conteudo')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Seu Mural</h3>
        </div>
        <div class="row m-2 d-flex align-items-center justify-content-between">

            <div class="username">
                <h4 class="m-0">Olá <b>{{ $authuser->nome }}</b></h4>
            </div>
            <div class="d-flex">
                Cargo:<div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $authuser->cargo->nome }}</div>
                Operação: <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">
                    {{ $authuser->operacao->nome }}
                </div>
            </div>
        </div>
    </div>
    <hr />


    @foreach ($mural as $murals)
        <div class="card card-primary">

            <div class="row mx-2 d-flex align-items-center justify-content-between">

                <div class="title">
                    <h4><b>{{ $murals->titulo }}</b></h4>
                </div>
                <div class="d-flex">
                    <div class="p-1 m-1 badge">{{ $authuser->nome }}</div>
                    <div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $murals->cargo->nome }}</div>
                    <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">
                        {{ $murals->operacao->nome }}</div>

                </div>
            </div>
            <hr class="mt-0" />
            <div class="row ml-2">
                {{ $murals->post }}
            </div>
        </div>
    @endforeach
@endsection
