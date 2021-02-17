<?php

namespace App\models\specialites;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class specialites_translate_m extends Model
{
    use SoftDeletes;

    protected $table      = "specialites_translate";

    protected $primaryKey = "id";

    protected $fillable   =
    [
        'spe_id', 'title','specialties', 'lang_id'
    ];

    protected $dates      = ["deleted_at"];

}
