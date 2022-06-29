@extends('layouts.adminlte')

@section('header')
    SimpleWall
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Seu Mural</h3>
        </div>
        <div class="row m-2 d-flex align-items-center justify-content-between">

            <div class="username">
                <h4 class="m-0">Olá <b>{{ $authuser->name }}</b></h4>
            </div>
            <div class="d-flex">
                Cargo:<div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $authuser->role->name }}</div>
                Operação: <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">
                    {{ $authuser->operation->name }}
                </div>
            </div>
        </div>
    </div>
    <hr />


    @foreach ($wall as $walls)
        <div class="card card-primary">

            <div class="row mx-2 d-flex align-items-center justify-content-between">

                <div class="title">
                    <h4><b>{{ $walls->title }}</b></h4>
                </div>
                <div class="d-flex">
                    <div class="p-1 m-1 badge">{{ $authuser->name }}</div>
                    <div class="p-1 m-1 text-white rounded-pill badge badge-info">{{ $walls->role->name }}</div>
                    <div class="p-1 m-1 text-white rounded-pill badge badge-secondary">
                        {{ $walls->operation->name }}</div>

                </div>
            </div>
            <hr class="mt-0" />
            <div class="row ml-2">
                {{ $walls->post }}
            </div>
        </div>
    @endforeach
@endsection
