<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    function login(Request $request){
        $usuario = $request->input('usuario');
        $password = $request->input('password');

        $usuario = Usuario::where('usuario',$usuario)->first();
        if(!$usuario){
            return view('login.login')->with('error','Usuario no existe');    
        }
        
        if($usuario->estado == true && $usuario->password === $password){
            //Dashboard
            $usuario_logueado = array("nombre_usuario"=>$usuario->nombre,"usuario" => $usuario->usuario, "estado" => $usuario->estadom, "tipo_usuario"=>$usuario->tipo_usuario);
            
            //session('usuario_logueado', $usuario_logueado);
            session()->put('usuario_logueado', $usuario_logueado);
            session()->save();         
            return redirect('dashboard'); 
            
            //return redirect('dashboard');
        }else{
            if($usuario->estado === false){
                return view('login.login')->with('error','Usuario no tiene acceso al sistema');
            }

            if($usuario->password !== $password){
                return view('login.login')->with('error','Credenciales incorrectas.');
            }
        }
    }
    function cerrar_session(Request $request){
        $request->session()->forget('usuario_logueado');
        $request->session()->save();
        return redirect('/');
    }
}
