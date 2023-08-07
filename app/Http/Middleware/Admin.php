<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         /* admin middleware process */
         if ((Auth::check()) &&  (Auth::user()->is_active == 1) && (Auth::user()->user_type == 1)) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
