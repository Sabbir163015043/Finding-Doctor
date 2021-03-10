<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testingtype extends Model
{
    public  function userinformation(){
        return $this->belongsTo('App\Userinformation');
    }
}
