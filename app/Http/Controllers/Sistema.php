<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sistema extends Controller
{
    function dashboard (Request $request){
        return view('dashboard.dashboard')->with('usuario_logueado',$request->session()->get('usuario_logueado'));    
    }
}
