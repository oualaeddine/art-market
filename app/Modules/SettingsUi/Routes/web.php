<?php

use App\Modules\SettingsLogic\Controllers\EditSettings;
use App\Modules\SettingsLogic\Controllers\faq\DeleteFAQ;
use App\Modules\SettingsLogic\Controllers\faq\EditFAQ;
use App\Modules\SettingsLogic\Controllers\faq\StoreFAQ;
use App\Modules\SettingsLogic\Controllers\faq\ToggleFAQ;
use App\Modules\SettingsLogic\Controllers\faq\UpdateFAQ;
use App\Modules\SettingsLogic\Controllers\home_categories\DeleteHomeCategory;
use App\Modules\SettingsLogic\Controllers\home_categories\StoreHomeCategory;
use App\Modules\SettingsLogic\Controllers\home_offers\DeleteHomeOfferProduct;
use App\Modules\SettingsLogic\Controllers\home_offers\StoreHomeOfferProduct;
use App\Modules\SettingsLogic\Controllers\UpdateSettings;
use App\Modules\SettingsUi\Controllers\GetProducts;
use App\Modules\SettingsUi\Controllers\ShowFAQ;
use App\Modules\SettingsUi\Controllers\ShowHomeCategories;
use App\Modules\SettingsUi\Controllers\ShowHomeOffers;
use App\Modules\SettingsUi\Controllers\ShowSettings;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'parametres', 'as' => 'settings.'], function () {
    Route::get('/', ShowSettings::class)->name('index');

    Route::get('{setting}/edit', EditSettings::class)->name('edit');
    Route::put('{setting}/update', UpdateSettings::class)->name('update');

});

Route::group(['prefix' => 'home-offers', 'as' => 'home-offers.'], function () {
    Route::get('/', ShowHomeOffers::class)->name('index');
    Route::get('/getProducts', GetProducts::class)->name('get.products');
    Route::post('/store', StoreHomeOfferProduct::class)->name('store');
    Route::delete('{offer}/delete', DeleteHomeOfferProduct::class)->name('delete');

});

Route::group(['prefix' => 'home-categories', 'as' => 'home-categories.'], function () {
    Route::get('/', ShowHomeCategories::class)->name('index');
    Route::post('/store', StoreHomeCategory::class)->name('store');
    Route::delete('{category}/delete', DeleteHomeCategory::class)->name('delete');

});

Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
    Route::get('/', ShowFAQ::class)->name('index');
    Route::get('{faq}/getFaq', EditFAQ::class)->name('edit');
    Route::put('{faq}/update', UpdateFAQ::class)->name('update');
    Route::post('/store', StoreFAQ::class)->name('store');
    Route::delete('{faq}/delete', DeleteFAQ::class)->name('delete');
    Route::put('{faq}/toggle', ToggleFAQ::class)->name('toggle');

});
