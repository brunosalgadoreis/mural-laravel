<?php

namespace App\Http\Controllers\Intra;

use App\Cargo;
use App\Http\Controllers\Controller;
use App\Operacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show()
    {
    }

    public function create()
    {
        //$user = User::all();
        $user = User::with('cargo', 'operacao')->get();
        $cargo = Cargo::all();
        $operacao = Operacao::all();
        return view('intra.user.create', ['user' => $user, 'cargo' => $cargo->except('5'), 'operacao' => $operacao->except('5')]);
    }

    public function store(Request $request)
    {

        //$data = $request->all();
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('cad_user');
    }

    public function edit($id)
    {   
        $cargo = Cargo::all();
        $operacao = Operacao::all();
        $user = User::find($id);
        return view('intra.user.edit', ['user' => $user, 'cargo' => $cargo->except('5'), 'operacao' => $operacao->except('5')]);
    }

    public function update(Request $request, $id)
    {

        //$data = $request->all();
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        User::find($id)->update($data);
        return redirect()->route('cad_user');
    }

    public function destroy(Request $request)
    {

        $data = User::find($request->id);
        $data->delete();

        $request->session()->flash(
            'mensagem',
            "Cargo $data->nome removido com sucesso."
        );

        return redirect()->route('cad_user');
    }
}
