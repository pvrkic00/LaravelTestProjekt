<?php

namespace App\Http\Controllers;

use App\ConfigHelper as ConfigHelper;
use App\Environments as Environments;
use App\Site as Site;
use App\Site_db as Site_db;
use Artisan as ArtisanAlias;
use Illuminate\Http\Request;


class SiteController extends Controller
{

    public function __construct(Environments $environments, Site $site, ConfigHelper $configHelper)
    {
        $this->environments = $environments->get_enum_values();
        $this->site = $site;
        $this->helper = $configHelper;
    }


    public function index()
    {
        $data['environments'] = $this->environments;

        return view('contents.addSite', $data);
    }


    public function newSite(Request $request, Site $site, Environments $environment, Site_db $site_db)
    {

        $dataRecived = [];
        $dataRecived['name'] = $request->input('siteName');
        $dataRecived['env']['names'] = $request->input('env');


        if ($request->isMethod('post')) {
            //dd($data);
            $this->validate(
                $request,
                [
                    'siteName' => 'required|min:5',
                    'env' => 'required',
                ]


            );

            $site->name = $dataRecived['name'];
            $site->save();


            foreach ($dataRecived['env']['names'] as $env) {
                $environment->refresh();
                $site->refresh();


                $site_instance = Site::find($site->id);


                $environment = new Environments();

                $environment->env_type = $env;
                $environment->site()->associate($site_instance);
                $environment->saveOrFail();
                $environment->refresh();

                $site_instance->environments()->save($environment);


                $site->environments()->save($environment);
                $env_instance = Environments::where('env_type', $environment->env_type)
                    ->where('site_id', $site_instance->id)->first();

                //                $site->environments()

                $site_db = new Site_db();
                $site_db->name = $env . "_" . $site->name;
                $site_db->environments()->associate($env_instance);
                $site_db->saveOrFail();
                $env_instance->database()->save($site_db);


            }


            foreach ($dataRecived['env']['names'] as $env) {
                $site_name = $env . "_" . $dataRecived['name'];

                $this->helper->createDatabaseForSite($site_name);

                $databaseConnection = $this->helper->configureConnectionByName($site_name);
                ArtisanAlias::call('migrate', array('--database' => $databaseConnection['database'], '--path' => 'database/migrations'));

            }


            return redirect()->route('content');

        }


    }

}

