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
        if ($user->tipo != '1') {
        $mural = Mural::with('cargo', 'operacao')->whereIn('cargo_id', [$user->cargo_id, "1"])
            ->whereIn('operacao_id', [$user->operacao_id, "1"])->get();
            $mural = Mural::paginate(5);
        }else{
            $mural = Mural::all();
            $mural = Mural::paginate(5);
        }

        //dd($mural);
        //$mural = Mural::with('cargo', 'operacao')->get();


        return view('intra.index', ['mural' => $mural, 'user' => $user,]);
    }
}
