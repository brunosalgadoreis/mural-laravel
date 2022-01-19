<?php

namespace App\Http\Controllers;

use App\Operacao;
use Illuminate\Http\Request;

class OperacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $operacao = Operacao::all();
        return view('intra.operacao.create', ['operacao' => $operacao]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Operacao::create($data);
        return redirect()->route('cad_operacao');
    }
}
