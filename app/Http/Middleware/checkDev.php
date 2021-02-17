<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkDev
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
        if(is_object($user) && $user->is_active == 1 && $user->user_type == "dev"){
            return $next($request);
        }
        return redirect("/");
    }
}
