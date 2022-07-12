<?php

namespace App\Modules\ProductsUi\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProductsUiProvider extends ServiceProvider
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
        View::addNamespace('ProductsUi', __DIR__ . '/../Views');
    }
}
