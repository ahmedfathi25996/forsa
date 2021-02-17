<?php

namespace App\models\social_list;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class social_list_translate_m extends Model
{
    use SoftDeletes;

    protected $table      = "social_list_translate";

    protected $primaryKey = "id";

    protected $fillable   =
    [
        'social_list_id', 'name', 'lang_id'
    ];

    protected $dates      = ["deleted_at"];

}
