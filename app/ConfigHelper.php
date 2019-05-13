<?php


namespace App;


use App as AppAlias;
use Exception as ExceptionAlias;
use Illuminate\Support\Facades\DB;

class ConfigHelper
{


    public function configureConnectionByName($siteName)
    {

        try {

            $config = AppAlias::make('config');

            // Will contain the array of connections that appear in our database config file.
            $connections = $config->get('database.connections');

            // This line pulls out the default connection by key (by default it's `mysql`)
            $defaultConnection = $connections[$config->get('database.default')];

            // Now we simply copy the default connection information to our new connection.
            $newConnection = $defaultConnection;
            // Override the database name.
            $newConnection['database'] = $siteName;

            // This will add our new connection to the run-time configuration for the duration of the request.
            AppAlias::make('config')->set('database.connections.' . $siteName, $newConnection);

            return $newConnection;

        } catch (ExceptionAlias $e) {
            \Log::error($e->getMessage());
            return ($e->getMessage());
            // Just get access to the config.

        }
    }

    public function createDatabaseForSite($dbName)
    {
        try {
            DB::statement('CREATE DATABASE ' . $dbName);

        } catch (ExceptionAlias $e) {
            \Log::error($e->getMessage());
            return ($e->getMessage());
        }
    }

}
