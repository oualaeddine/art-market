<?php

namespace App\Modules\SettingsLogic\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingsProvider extends ServiceProvider
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
