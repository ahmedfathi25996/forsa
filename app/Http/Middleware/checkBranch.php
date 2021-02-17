<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class checkBranch
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
        if(is_object($user) && $user->is_active == 1 && in_array($user->user_type,["branch"])){
            return $next($request);
        }

        return redirect("/");
    }
}
