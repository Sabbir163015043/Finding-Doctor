<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospitalinformation extends Model
{
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function doctortype(){
        return $this->belongsTo('App\Doctortype');
    }
}
