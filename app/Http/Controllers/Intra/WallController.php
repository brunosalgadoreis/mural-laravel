<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Operation;
use App\Role;
use App\Wall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{


    public function create()
    {
        $authuser = Auth::user();
        //dd($authuser);
        $role = Role::all();
        $operation = Operation::all();
        if ($authuser->is_admin) {
            $wall = Wall::with('role', 'operation')->get();
            return view('intra.wall.create', ['wall' => $wall, 'role' => $role, 'operation' => $operation, 'authuser' => $authuser]);
        }

        return redirect()->route('wall');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Wall::create($data);

        return redirect()->route('cad_wall');
    }

    public function destroy(Request $request)
    {

        $data = Wall::find($request->id);
        $data->delete();
        $request->session()->flash(
            'mensagem',
            "Cargo $data->nome removido com sucesso."
        );

        return redirect()->route('cad_wall');
    }
}
