<?php

namespace App\models\brands;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class brand_translate_m extends Model
{
    use SoftDeletes;

    protected $table           = "brands_translate";

    protected $primaryKey      = "id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
            'brand_id','brand_name','lang_id'

        ];


}
