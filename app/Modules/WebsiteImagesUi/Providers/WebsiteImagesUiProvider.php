<?php

namespace App\Modules\WebsiteImagesUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebsiteImagesUiProvider extends ServiceProvider
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

        View::addNamespace('WebsiteImagesUi',__DIR__ . '/../Views');

 

    }
}
