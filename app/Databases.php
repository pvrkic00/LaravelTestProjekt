<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Databases extends Model
{
    //

    public function environmentsDB(){
        return $this->belongsTo(Enviroments::class,'env_id','id');
    }
}
