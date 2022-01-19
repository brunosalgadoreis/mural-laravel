<?php

namespace App\Http\Controllers;

use App\Mural;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuralController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        
        $user = Auth::user();
        //dd($user);
        if($user->tipo == '1'){
            $mural = Mural::with('cargo', 'operacao')->get();
            return view('intra.mural.create', ['mural' => $mural]);
        }

        return redirect()->route('mural');
        
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Mural::create($data);

        return redirect()->route('cad_mural');
    }
}
