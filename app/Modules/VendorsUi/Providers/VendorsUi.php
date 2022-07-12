<?php

namespace App\Modules\VendorsUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class VendorsUi extends ServiceProvider
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
        View::addNamespace('VendorsUi', __DIR__ . '/../Views');
    }
}
