<?php

namespace App\models\days;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class days_translate_m extends Model
{
    use SoftDeletes;

    protected $table        = "days_translate";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
    [
        'day_name', 'day_id', 'lang_id'
    ];


}
