<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $table = 'site';


    public function environments()
    {

        return $this->hasMany(Environments::class);

    }

}
