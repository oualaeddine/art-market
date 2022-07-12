<?php

namespace App\Modules\WebsiteUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebsiteUiProvider extends ServiceProvider
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

        View::addNamespace('WebsiteUi',__DIR__ . '/../Views');


    }
}
