<?php

namespace App\Http\Middleware;

use Closure;
use App;

class WebLocalization
{

    use App\Http\Controllers\traits\middlewareTrait;

    public function handle($request, Closure $next)
    {

        #region localization

        $locale     = "ar";
        if(\Illuminate\Support\Facades\Session::has('locale'))
        {
            $get_locale = \Illuminate\Support\Facades\Session::get('locale');
            $get_locale = ($get_locale);
            if(!empty($get_locale) && in_array($get_locale, ["ar", "en"]))
            {
                $locale = $get_locale;
            }
        }

        config([
            'locale'   => $locale,
        ]);

        #endregion


        #region menu display type

        $menu_display     = "navbar";
        if(\Illuminate\Support\Facades\Session::has('menu_display'))
        {
            $get_menu_display = \Illuminate\Support\Facades\Session::get('menu_display');
            $get_menu_display = ($get_menu_display);
            if(!empty($get_menu_display) && in_array($get_menu_display, ["navbar", "sidebar"]))
            {
                $menu_display = $get_menu_display;
            }
        }

        config([
            'menu_display'   => $menu_display,
        ]);

        #endregion


        #region dark mode

        if(\Illuminate\Support\Facades\Session::has('dark_mode'))
        {
            $dark_mode = \Illuminate\Support\Facades\Session::get('dark_mode');
            if(!empty($dark_mode) && in_array($dark_mode, ["on","off"]))
            {
                config([
                    'dark_mode' => $dark_mode
                ]);
            }
        }
        else{
            config([
                'dark_mode' => "off"
            ]);
        }

        #endregion


        $this->setupConfig();

        return $next($request);
    }
}
