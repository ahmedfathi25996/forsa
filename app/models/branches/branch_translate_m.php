<?php

namespace App\models\branches;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class branch_translate_m extends Model
{
    use SoftDeletes;

    protected $table           = "branches_translate";

    protected $primaryKey      = "id";

    protected $dates           = ["deleted_at"];

    public $fillable           =
        [
            'branch_id','branch_name','branch_description','lang_id'

        ];


}
