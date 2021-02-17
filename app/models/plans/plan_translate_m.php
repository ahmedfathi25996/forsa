<?php

namespace App\models\plans;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class plan_translate_m extends Model
{
    use SoftDeletes;

    protected $table           = "plans_translate";

    protected $primaryKey      = "id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
            'plan_id','plan_name','plan_description','plan_type','lang_id'

        ];


}
