<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_db extends Model
{
    //

    public function environmentsDB(){
        return $this->belongsTo(Environments::class,'env_id','id');
    }
}
