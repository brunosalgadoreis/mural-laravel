<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $cargo = Cargo::all();
        return view('intra.cargo.create', ['cargo' => $cargo]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Cargo::create($data);
        return redirect()->route('cad_cargo');
    }
}
