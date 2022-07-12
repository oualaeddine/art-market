<?php

use App\Modules\BrandsLogic\Controllers\DeleteBrand;
use App\Modules\BrandsLogic\Controllers\EditBrand;
use App\Modules\BrandsLogic\Controllers\RestoreBrand;
use App\Modules\BrandsLogic\Controllers\StoreBrand;
use App\Modules\BrandsLogic\Controllers\UpdateBrand;
use App\Modules\BrandsUi\Controllers\ShowArchivedBrands;
use App\Modules\BrandsUi\Controllers\ShowBrands;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'marques', 'as' => 'brands.'], function () {
    Route::get('/', ShowBrands::class)->name('index');
    Route::get('archived', ShowArchivedBrands::class)->name('archived');
    Route::post('/store', StoreBrand::class)->name('store');
    Route::get('/edit/{brand}', EditBrand::class)->name('edit');
    Route::put('/update/{brand}', UpdateBrand::class)->name('update');
    Route::put('toggle/{brand}', \App\Modules\BrandsLogic\Controllers\ToggleBrand::class)->name('toggle');
    Route::delete('/destroy/{brand}', DeleteBrand::class)->name('delete');
    Route::delete('restore/{brand}', RestoreBrand::class)->name('restore')->withTrashed();
});
