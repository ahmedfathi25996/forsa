<?php

namespace App\models\doctors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class doctors_translate_m extends Model
{
    use SoftDeletes;

    protected $table      = "doctors_translate";

    protected $primaryKey = "id";

    protected $fillable   =
        [
            'doctor_id', 'full_name','job_title','country','brief_bio', 'lang_id'
        ];

    protected $dates      = ["deleted_at"];

}
