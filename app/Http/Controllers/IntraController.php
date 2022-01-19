<?php

namespace App\Http\Controllers;

use App\Mural;
use Illuminate\Http\Request;

class IntraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $mural = Mural::with('cargo', 'operacao')->get();
        return view('intra.index', ['mural' => $mural]);
    }
}
