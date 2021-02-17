<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class attachments_m extends Model
{

    use SoftDeletes;

    protected $table        = "attachments";

    protected $dates        = ["deleted_at"];

    protected $primaryKey   = "id";

    protected $fillable     =
    [
        "title", "alt", "path"
    ];

    static function get_imgs_from_arr($ids){

        $results = attachments_m::whereIn("id",$ids)->get();

        return $results;
    }

    static function save_img($id = null , $title = "" , $alt = "" , $path = ""){

        // for insert
        if ($id == null)
        {
            $img = attachments_m::create([
                "title" =>  $title,
                "alt" =>  $alt,
                "path" =>  $path
            ]);

            // get last inserted id
            return $img->id;
        }

        // for edit if path exist
        if ($path != "")
        {
            $last_img_data = attachments_m::find($id);

            if(is_object($last_img_data)){

                $old_file_path = public_path($last_img_data->path);
                $old_file_path = str_replace('/','\\',$old_file_path);
                $old_file_path = str_replace('\\public','',$old_file_path);

                if (is_file($old_file_path)){
                    unlink($old_file_path);
                }

                if (is_file(public_path($last_img_data->path))){
                    unlink(public_path($last_img_data->path));
                }

                attachments_m::where('id',$id)->update([
                    "title" =>  $title,
                    "alt"   =>  $alt,
                    "path"  =>  $path
                ]);
            }else{
                //add
                $img = attachments_m::create([
                    "title" =>  $title,
                    "alt"   =>  $alt,
                    "path"  =>  $path
                ]);

                // get last inserted id
                return $img->id;
            }


        }
        // for edit if path not exist
        else{

            attachments_m::where('id',$id)->update([
                "title" =>  $title,
                "alt"   =>  $alt
            ]);
        }

        return $id;

    }

}
