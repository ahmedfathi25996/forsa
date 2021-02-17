<?php

namespace App\models\payment_method;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment_method_translate_m extends Model
{
    use SoftDeletes;

    protected $table = "payment_method_translate";

    protected $primaryKey = "id";

    protected $dates = ["deleted_at"];

    protected $fillable = [
        'payment_method_id', 'payment_method_name', 'lang_id'
    ];

}
