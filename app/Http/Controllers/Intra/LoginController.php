<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('intra.login.index');
    }

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only(['cpf', 'password']))) {
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos');
        }

        $user = Auth::user();
        if ($user->is_admin == '1') {
            return redirect()->route('cad_wall');
        }

        return redirect()->route('wall');
    }
}
