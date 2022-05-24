<?php

namespace App\Http\Controllers\Intra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlteController extends Controller
{
    public function index()
    {
        return view('intra.alte');
    }
}
