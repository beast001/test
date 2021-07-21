<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->is_admin == false) {
            return $next($request);
        }elseif ($request->user()->is_admin == true)
            return redirect('/dashboard');

        // We know who the user is, but they are not an admin or a normal user.
        abort(403);
    }
}
