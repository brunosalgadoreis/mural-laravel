@extends('layouts.adminlte')

@section('cabecalho')
    SimpleWall
@endsection

@section('sidebar')
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/intra" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    SimpleWall
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
    @endsection
    <div class="card-body">
    @section('conteudo')
        <div class="row m-2 d-flex align-items-center justify-content-between">

            <div class="username">
                <h4 class="m-0"><b>{{ $user->nome }}</b></h4>
            </div>
            <div class="d-flex">
                <div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $user->cargo->nome }}</div>
                <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">{{ $user->operacao->nome }}</div>
            </div>
        </div>

        <hr />
        
            @foreach ($mural as $murals)
                <li class="card">

                    <div class="row mx-2 d-flex align-items-center justify-content-between">

                        <div class="title">
                            <h4><b>{{ $murals->titulo }}</b></h4>
                        </div>
                        <div class="d-flex">
                            <div class="p-1 m-1 badge">{{ $murals->user->nome }}</div>
                            <div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $murals->cargo->nome }}</div>
                            <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">
                                {{ $murals->operacao->nome }}</div>

                        </div>
                    </div>
                    <hr class="mt-0" />
                    <div class="row ml-2">
                        {{ $murals->post }}
                    </div>
                </li>
            @endforeach
        @endsection
    </div>
