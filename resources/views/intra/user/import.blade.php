@extends('layouts.adminlte')

@section('username')
    {{ $authuser->name }}
@endsection

@section('photo')
    {{ $authuser->photo }}
@endsection

@section('header')
    Importação
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Importar usuários</h3>
        </div>
        <form action="/intra/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="mb-3">
                        <label for="photo" class="">Arquivo Excel</label>
                        <input class="form-control" type="file" name="excel" id="excel">
                    </div>
                </div>
                <button class="btn btn-primary mt-2">Importar</button>
        </form>
            </div>
    </div>
@endsection
