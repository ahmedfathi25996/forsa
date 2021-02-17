<?php

namespace App\models\branches\offers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class offer_translate_m extends Model
{
    use SoftDeletes;

    protected $table        = "offers_translate";

    protected $primaryKey   = "id";

    protected $dates        = ["deleted_at"];

    protected $fillable     =
        [
            'offer_id','offer_title','offer_description','lang_id',


        ];

}
