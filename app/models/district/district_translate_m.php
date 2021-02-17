<?php

namespace App\models\district;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class district_translate_m extends Model
{
    use SoftDeletes;

    protected $table        = "district_translate";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'district_name', 'district_id', 'lang_id',
        'district_meta_title','district_meta_description',
        'district_meta_keywords'
    ];

}
