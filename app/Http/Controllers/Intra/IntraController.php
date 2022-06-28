<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Mural;
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
        $authuser = Auth::user();
        if (!$authuser->is_admin) {
            $mural = Mural::with('cargo', 'operacao')->whereIn('cargo_id', [$authuser->cargo_id, "1"])
                ->whereIn('operacao_id', [$authuser->operacao_id, "1"])->get();
            $mural = Mural::paginate(5);
        } else {
            $mural = Mural::all();
            $mural = Mural::paginate(5);
        }

        return view('intra.index', ['mural' => $mural, 'authuser' => $authuser,]);
    }
}
