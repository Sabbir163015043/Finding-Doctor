<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinformation extends Model
{
    public function testingtype(){
        return $this->belongsTo('App\Testingtype');
    }

    public function user_userinformation(){
        return $this->belongsTo('App\UserUserinformation');
    }
}
