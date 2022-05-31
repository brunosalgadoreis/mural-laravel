@extends('layouts.login')



@section('conteudo')

    @include('intra.erros', ['errors' => $errors])

    @section('cabecalho')
    Login
    @endsection

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Login</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">CPF</label>
              <input type="text" class="form-control" name="cpf" id="cpf" required  placeholder="Entre com CPF">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="password" required min="1" placeholder="Senha">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
        </form>
      </div>
@endsection
