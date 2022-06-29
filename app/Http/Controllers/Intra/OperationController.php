<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{

    public function create(Request $request)
    {
        $authuser = Auth::user();
        $operation = Operation::all();
        $mensagem = $request->session()->get('mensagem');

        return view('intra.operation.create', ['operation' => $operation, 'mensagem' => $mensagem, 'authuser' => $authuser]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Operation::create($data);
        $request->session()->flash('mensagem', 'Operação criada com sucesso');

        return redirect()->route('cad_operation');
    }

    public function destroy(Request $request)
    {
        $data = Operation::find($request->id);
        $data->delete();
        $request->session()->flash(
            'mensagem',
            "Operacao $data->nome removida com sucesso."
        );

        return redirect()->route('cad_operation');
    }
}
