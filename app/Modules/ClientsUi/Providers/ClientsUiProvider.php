<?php

namespace App\Modules\ClientsUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ClientsUiProvider extends ServiceProvider
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
         * View Loader
         */

        View::addNamespace('ClientsUi',__DIR__ . '/../Views');

 

    }
}
