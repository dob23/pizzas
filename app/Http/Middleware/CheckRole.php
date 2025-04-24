<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //verificar si el usuario esta autenticado y tiene el rol requerido
        if(!Auth::check() || Auth::user()->role !== $role){
            //Si no tiene el rol, devolver un error 403 (Forbiden)
            abort(403, 'Unauthorized access');
        }
        //Si tiene el rol, permitir el acceso a la ruta
        return $next($request);
    }
}
