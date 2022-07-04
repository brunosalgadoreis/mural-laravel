<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Operation;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        $role = Role::all();
        $operation = Operation::all();

        return view('intra.register.create', ['role' => $role->except('1'), 'operation' => $operation->except('1')]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('loginsw');
    }
}
