<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('intra.entrar.index');
    }

    public function entrar(Request $request)
    {
        //dd(Auth::attempt($request->only(['cpf', 'password'])));

        if (!Auth::attempt($request->only(['cpf', 'password']))) {
            //dd($request);
            return redirect()
                ->back()
                ->withErrors('Usuário e/ou senha incorretos');
        }

        $user = Auth::user();
        if ($user->tipo == '1') {
            return redirect()->route('cad_mural');
        }

        return redirect()->route('mural');
    }
}
