<?php

namespace App\models\pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pages_translate_m extends Model
{
    use SoftDeletes;

    protected $table      = "pages_translate";

    protected $primaryKey = "id";
    protected $dates      = ["deleted_at"];

    protected $fillable   =
    [
        'page_id', 'page_title', 'page_meta_title', 'page_body',
        'page_meta_description', 'page_meta_keywords',
        'page_slug' , 'lang_id'
    ];

}
