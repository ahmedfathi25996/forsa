<?php

namespace App\models\offers_types;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class offers_types_translate_m extends Model
{
    use SoftDeletes;

    protected $table           = "offer_type_translate";

    protected $primaryKey      = "id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
            'offer_type_id','offer_type_name','lang_id'

        ];


}
