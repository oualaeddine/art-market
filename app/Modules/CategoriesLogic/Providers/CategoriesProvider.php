<?php

namespace App\Modules\CategoriesLogic\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoriesProvider extends ServiceProvider
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

    }
}
