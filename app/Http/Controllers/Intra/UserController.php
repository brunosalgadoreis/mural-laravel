<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
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
        $user = User::all();
        return view('intra.user.create', ['user' => $user]);
    }

    public function store(Request $request)
    {

        //$data = $request->all();
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('cad_user');
    }
}
