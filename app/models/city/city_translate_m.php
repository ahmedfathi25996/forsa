<?php

namespace App\models\city;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class city_translate_m extends Model
{
    use SoftDeletes;

    protected $table        = "city_translate";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'city_name', 'city_id', 'lang_id',
        'city_meta_title','city_meta_description',
        'city_meta_keywords'
    ];


}
