<?php

namespace App\Modules\ClientsLogic\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ClientProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Migration Loader
         */
        $this->loadMigrationsFrom([
            __DIR__ . '/../Migrations'
        ]);


        /**
         * Seeders Loader
         */


        /**
         * View Loader
         */

        View::addNamespace('clients', __DIR__ . '/../Views');

    }
}
