<?php

namespace App\models\doctors\certificates;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class certificates_translate_m extends Model
{
    use SoftDeletes;

    protected $table      = "doctors_certificates_translate";

    protected $primaryKey = "id";

    protected $fillable   =
        [
            'cer_id', 'title', 'lang_id'
        ];

    protected $dates      = ["deleted_at"];

}
