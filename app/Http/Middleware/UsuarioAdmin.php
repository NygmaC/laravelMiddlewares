<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class UsuarioAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->exists('login')){
            $login = $request->session()->get('login');
            Log::Debug($login);
            if($login['admin']){
                return $next($request);
            }
            
        }
        return redirect()->route('negado');
    }
}
