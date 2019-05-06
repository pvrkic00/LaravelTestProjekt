<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function environments()
    {

        return $this->hasMany(Enviroments::class);

    }

}
