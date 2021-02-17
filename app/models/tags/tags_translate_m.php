<?php

namespace App\models\tags;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tags_translate_m extends Model
{
    use SoftDeletes;

    protected $table        = "tags_translate";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'tag_name', 'tag_id', 'lang_id'
    ];

}
