<?php

namespace App\Http\Controllers\Intra;

use App\Cargo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CargoController extends Controller
{

    public function create(Request $request)
    {
        $cargo = Cargo::all();
        $mensagem = $request->session()->get('mensagem');

        return view('intra.cargo.create', ['cargo' => $cargo, 'mensagem' => $mensagem]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Cargo::create($data);

        $request->session()->flash('mensagem', 'Cargo criado com sucesso');
        return redirect()->route('cad_cargo');
    }

    public function destroy(Request $request)
    {

        $data = Cargo::find($request->id);
        $data->delete();

        $request->session()->flash(
            'mensagem',
            "Cargo $data->nome removido com sucesso."
        );

        return redirect()->route('cad_cargo');
    }
}
