<?php

namespace App\Http\Controllers\Intra;

use App\Http\Controllers\Controller;
use App\Wall;
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
        if ($authuser->is_admin == '0') { //resolver essa regra
            $wall = Wall::with('role', 'operation')->whereIn('role_id', [$authuser->role_id, "1"])
                ->whereIn('operation_id', [$authuser->operation_id, "1"])->get();
            $wall = Wall::paginate(5);
        } else {
            $wall = Wall::all();
            $wall = Wall::paginate(5);
        }

        return view('intra.index', ['wall' => $wall, 'authuser' => $authuser,]);
    }
}
