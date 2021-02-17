<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class checkAdmin
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
        $user = Auth::user();
        if(is_object($user) && $user->is_active == 1 && in_array($user->user_type,["admin","dev"])){
            return $next($request);
        }

        return redirect("/");
    }
}
