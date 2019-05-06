<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enviroments extends Model
{
    //



    public function sites()
    {
        return $this->belongsTo(Sites::class,'site_id','id');
    }

    public function database(){
        return $this->hasOne(Databases::class);
    }


}
