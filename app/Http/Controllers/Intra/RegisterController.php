<?php

namespace App\Http\Controllers\Intra;

use App\Cargo;
use App\Http\Controllers\Controller;
use App\Operacao;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        $cargo = Cargo::all();
        $operacao = Operacao::all();

        return view('intra.register.create', ['cargo' => $cargo->except('1'), 'operacao' => $operacao->except('1')]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('entrar');
    }
}
