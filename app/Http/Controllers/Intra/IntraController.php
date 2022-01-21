<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Mural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = Auth::user();
        $mural = Mural::with('cargo', 'operacao')->where('cargo_id', $user->cargo_id)
        ->where('operacao_id', $user->operacao_id)->get();

        //dd($mural);
        //$mural = Mural::with('cargo', 'operacao')->get();
        

        return view('intra.index', ['mural' => $mural, 'user' => $user]);
    }
}
