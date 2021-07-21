<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /*public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }*/


    public function handle($request, Closure $next)
    {
        if ($request->user()->is_admin == true) {
            return $next($request);
        }

        // We know who the user is, but they are not an administrator.
        abort(403);
    }
}
