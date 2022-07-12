<?php

namespace App\Modules\RulesLogic\Providers;

use Illuminate\Support\ServiceProvider;

class RulesLogicProvider extends ServiceProvider
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
