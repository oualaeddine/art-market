<?php

namespace App\Modules\BrandsLogic\Providers;

use Illuminate\Support\ServiceProvider;

class BrandsLogicProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
    }
}
