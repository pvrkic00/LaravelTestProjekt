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

    public function database()
    {
        return $this->belongsTo('App\Databases', 'database_id', 'id');
    }

    public function enviroments()
    {
        return $this->belongsTo('App\Enviroments', 'env_id', 'id');
    }

}
