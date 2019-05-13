<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Type;

class Environments extends Model
{
    protected $table = 'environments';
    //protected $fillable=['site_id'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function database(){
        return $this->hasOne(Site_db::class);
    }
    public function get_enum_values( )
    {
        $type = DB::table('information_schema.columns')->select("column_type")->where('table_schema','=','TestProjekt')
        ->where('data_type','=','enum')->get();



        preg_match("/enum\(\'(.*)\'\)/", $type,$matches);
//        dd($matches);
        $enum = explode("','", $matches[1]);
        //dd($enum);
        return $enum;
    }
    public function getSelectedEnvForSite($siteId)
    {
        $selectedEnv=DB::table('environments as env')->select('env.env_type')->where('site_id','=',$siteId)->get()->sortBy('env.id');

        return $selectedEnv;
    }


}
