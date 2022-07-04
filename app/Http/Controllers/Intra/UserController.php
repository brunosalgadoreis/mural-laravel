<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Operation;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create()
    {
        $authuser = Auth::user();
        $user = User::with('role', 'operation')->get();
        $role = Role::all();
        $operation = Operation::all();

        return view('intra.user.create', ['user' => $user, 'role' => $role->except('1'), 'operation' => $operation->except('1'), 'authuser' => $authuser]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('cad_user');
    }

    public function editUser(User $user)
    {
        $authuser = Auth::user();
        $role = Role::all();
        $operation = Operation::all();
        if ($authuser->id == $user->id) {
            $user = User::find($user->id);
        } else {
            return redirect()->route('wall');
        }

        return view('intra.user.edituser', ['user' => $user, 'role' => $role->except('1'), 'operation' => $operation->except('1'), 'authuser' => $authuser]);
    }

    public function edit($id)
    {
        $authuser = Auth::user();
        $role = Role::all();
        $operation = Operation::all();
        $user = User::find($id);

        return view('intra.user.edit', ['user' => $user, 'role' => $role->except('1'), 'operation' => $operation->except('1'), 'authuser' => $authuser]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'password');

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('Image'), $filename);
            $data['photo'] = $filename;
        }

        User::find($id)->update($data);

        return redirect()->route('cad_user');
    }

    public function destroy(Request $request)
    {
        $data = User::find($request->id);
        $data->delete();
        $request->session()->flash(
            'mensagem',
            "Cargo $data->name removido com sucesso."
        );

        return redirect()->route('cad_user');
    }
}
