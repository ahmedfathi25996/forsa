<?php

namespace App\Http\Middleware;

use App\Http\Controllers\traits\middlewareTrait;
use App\models\langs_m;
use Closure;

class APILocalization {

    use middlewareTrait;

    public function handle($request, Closure $next) {


        #region localization

        $language =  $request->header('Accept-Language'); // ex. en or ar
        $language = ($language);

        $lang_id = 1;
        if(!empty($language))
        {

            $get_lang = langs_m::where([
                "lang_symbole" => $language
            ])->first();

            if(is_object($get_lang))
            {
                app('translator')->setLocale("$language");
                $lang_id = $get_lang->lang_id;
            }

        }

        \Illuminate\Support\Facades\Config::set('lang_id', $lang_id);

        #endregion

        $this->setupConfig();

        return $next($request);
    }

}
