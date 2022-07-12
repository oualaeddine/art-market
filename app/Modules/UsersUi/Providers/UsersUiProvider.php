<?php

namespace App\Modules\UsersUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UsersUiProvider extends ServiceProvider
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

        View::addNamespace('UsersUi',__DIR__ . '/../Views');



    }
}
