<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utlity extends Model
{
    public static function file_upload($data,$file_name, $upload_dir)
    {
        if (isset($data['img'])) {
            $file = $data['img'];
            $filename = time() . '_' . $file->getClientOriginalName();
            $up_path = "uploads/".date('Y-m')."/$upload_dir/";
            $path = $file->move($up_path, $filename);
            if ($file->getError()) {
                $data->session()->flash('warning', $file->getErrorMessage());

                return FALSE;
            }

            return $path;
        }
    }
}
