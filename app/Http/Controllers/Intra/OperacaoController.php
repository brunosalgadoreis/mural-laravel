<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Operacao;
use Illuminate\Http\Request;

class OperacaoController extends Controller
{

    public function create(Request $request)
    {
        $operacao = Operacao::all();
        $mensagem = $request->session()->get('mensagem');
        return view('intra.operacao.create', ['operacao' => $operacao, 'mensagem' => $mensagem]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Operacao::create($data);
        $request->session()->flash('mensagem', 'Operação criada com sucesso');
        return redirect()->route('cad_operacao');
    }

    public function destroy(Request $request)
    {
        
        $data = Operacao::find($request->id);
        $data->delete();

        $request->session()->flash('mensagem',
        "Operacao $data->nome removida com sucesso.");

        return redirect()->route('cad_operacao');
    }
}
