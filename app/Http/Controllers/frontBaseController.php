<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\models\langs_m;
use Request;
use Illuminate\Support\Facades\Redirect;

class frontBaseController extends Controller
{

    public function __construct()
    {

        if (false && substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
        {
            ob_start("ob_gzhandler");
        }

        parent::__construct();

        $this->setLanguagesSettings();

    }


    public function setLanguagesSettings()
    {
        $all_langs                  = langs_m::get_langs();
        $this->data["all_langs"]    = $all_langs;
        $this->data["lang_ids"]     = $all_langs;

        $this->data["current_lang"] = $all_langs->where('lang_id',$this->lang_id)->first();
        $all_langs_titles           = $all_langs->pluck('lang_symbole')->all();

        if(in_array(Request::segment(1),$all_langs_titles)){

            $lang_row = $all_langs->where('lang_symbole',Request::segment(1))->first();

            if(is_object($lang_row)){
                $this->lang_id              = $lang_row->lang_id;
                $this->data["current_lang"] = $lang_row;
            }
        }

        $this->data["lang_url_segment"]     = "";
        if($this->lang_id != 1){
            $this->data["lang_url_segment"] = $this->data["current_lang"]->lang_symbole;
        }

    }

    public function redirectLoggedUser($use_lang_url = false)
    {

        $user_obj       = $this->data["current_user"];
        $redirect_url   = "/";

        if(is_object($user_obj))
        {
            if($use_lang_url)
            {
                $lang_url_segment   = $this->data["lang_url_segment"];
                $redirect_url       = "$lang_url_segment/";
            }

            if (is_object($user_obj) && in_array($user_obj->user_type,["admin","dev"]))
            {
                $redirect_url       = "admin/dashboard";
            }

            Redirect::to($redirect_url)->send();
        }

    }


}
