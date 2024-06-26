<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // or if(auth()->user()->cannot('admin'))
        if(auth()->user()?->is_admin !== 1){
abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
