<?php

namespace App\Modules\PendingPointsUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PendingPointsUiProvider extends ServiceProvider
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
        View::addNamespace('PendingPointsUi', __DIR__ . '/../Views');
    }
}
