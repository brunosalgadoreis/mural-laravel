<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function create(Request $request)
    {
        $authuser = Auth::user();
        $role = Role::all();
        $mensagem = $request->session()->get('mensagem');

        return view('intra.role.create', ['role' => $role, 'mensagem' => $mensagem, 'authuser' => $authuser]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Role::create($data);
        $request->session()->flash('mensagem', 'Cargo criado com sucesso');

        return redirect()->route('cad_role');
    }

    public function destroy(Request $request)
    {

        $data = Role::find($request->id);
        $data->delete();
        $request->session()->flash(
            'mensagem',
            "Cargo $data->name removido com sucesso."
        );

        return redirect()->route('cad_role');
    }
}
