<?php

namespace App\models\token_push;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class token_push_m extends Model
{
    use SoftDeletes;

    protected $table        = "push_tokens";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable =
    [
        'user_id','push_token','UDID','ip_address','country','device_type',
        'device_name','os_version','app_version','last_login_date'
    ];

    public static $default_lang_id = 1;

}
