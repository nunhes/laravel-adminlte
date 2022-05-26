<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NoSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('usuario_logueado')){
            /*if(session()->get('usuario_logueado') == null){
                return $next($request);
            }else{*/
                return $next($request);
                
            /*}*/
        }else{
            return redirect('/');
        }
    }
}
