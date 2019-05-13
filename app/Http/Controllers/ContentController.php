<?php

namespace App\Http\Controllers;


use App\Environments;
use App\Site;

class ContentController extends Controller
{
    //

    public function __construct(Environments $environments, Site $site)
    {
        $this->sites = $site->all();
        $this->environments = $environments;

    }


    public function index()
    {

        $sites = $this->sites;


        for ($i = 0; $i < sizeof($sites); $i++) {

            $sites[$i]['selected_env'] = $this->environments->getSelectedEnvForSite($sites[$i]->id)->pluck("env_type")->toArray();
        }

        $data['sites'] = $sites->toArray();


        return view('contents.home')->with($data);

    }

}
