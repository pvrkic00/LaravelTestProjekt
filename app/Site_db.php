<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_db extends Model
{
    //
    protected $table = 'site_db';

    //protected $fillable=['environments_id'];


    public function environments()
    {
        return $this->belongsTo(Environments::class);
    }
}
