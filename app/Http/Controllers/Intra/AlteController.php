<?php

namespace App\Http\Controllers\Intra;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlteController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('layouts.adminlte', ['user' => $user]);
    }
}
