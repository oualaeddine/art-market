<?php

use App\Modules\WebsiteImagesLogic\Controllers\GetCategoryProduct;
use App\Modules\WebsiteImagesLogic\Controllers\ToggleWebsiteImages;
use App\Modules\WebsiteImagesLogic\Controllers\UpdateWebsiteImages;
use App\Modules\WebsiteImagesUi\Controllers\ShowEditWebsiteImages;
use App\Modules\WebsiteImagesUi\Controllers\ShowWebsiteImages;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'website-images', 'as' => 'website-images.'], function () {

    Route::get('/', ShowWebsiteImages::class)->name('index');
    Route::get('{website_image}/modifier', ShowEditWebsiteImages::class)->name('edit');
    Route::put('{website_image}/update', UpdateWebsiteImages::class)->name('update');
    Route::put('{website_image}/toggle', ToggleWebsiteImages::class)->name('toggle');


    Route::get('/get_link/{id}', GetCategoryProduct::class)->name('get_link');
});
