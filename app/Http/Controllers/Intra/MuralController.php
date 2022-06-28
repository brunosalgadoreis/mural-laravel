<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Mural;
use App\Cargo;
use App\Operacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuralController extends Controller
{


    public function create()
    {

        $authuser = Auth::user();
        $cargo = Cargo::all();
        $operacao = Operacao::all();
        if ($authuser->is_admin) {
            $mural = Mural::with('cargo', 'operacao')->get();
            return view('intra.mural.create', ['mural' => $mural, 'cargo' => $cargo, 'operacao' => $operacao, 'authuser' => $authuser]);
        }

        return redirect()->route('mural');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Mural::create($data);

        return redirect()->route('cad_mural');
    }

    public function destroy(Request $request)
    {

        $data = Mural::find($request->id);
        $data->delete();
        $request->session()->flash(
            'mensagem',
            "Cargo $data->nome removido com sucesso."
        );

        return redirect()->route('cad_mural');
    }
}
