<?php

namespace App\Http\Middleware;


use Closure;
use Config;
use Illuminate\Http\Request;


class Language {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $language =  $request->header('Accept-Language');
        $language = intval($language);

        if (strlen($language) > 5 || empty($language))
            $language = 1;

        if($language == 1)
        {
            app('translator')->setLocale('ar');
        }
        else{
            app('translator')->setLocale('en');
        }

        \Illuminate\Support\Facades\Config::set('lang', $language);
        return $next($request);
    }

}
