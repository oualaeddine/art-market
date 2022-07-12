<?php

use App\Modules\ProductsLogic\Controllers\DeleteImage;
use App\Modules\ProductsLogic\Controllers\DeleteProduct;
use App\Modules\ProductsLogic\Controllers\ExportAllProducts;
use App\Modules\ProductsLogic\Controllers\GetImages;
use App\Modules\ProductsLogic\Controllers\ImportProducts;
use App\Modules\ProductsLogic\Controllers\StoreImages;
use App\Modules\ProductsLogic\Controllers\StoreProduct;
use App\Modules\ProductsLogic\Controllers\UpdateImage;
use App\Modules\ProductsLogic\Controllers\UpdateProduct;
use App\Modules\ProductsUi\Controllers\ShowCreateProducts;
use App\Modules\ProductsUi\Controllers\ShowEditProducts;
use App\Modules\ProductsUi\Controllers\ShowProducts;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'produits', 'as' => 'products.'], function () {

    Route::get('/', ShowProducts::class)->name('index');
    Route::get('archived', \App\Modules\ProductsUi\Controllers\ShowArchivedProducts::class)->name('archived');

    Route::get('/ajouter', ShowCreateProducts::class)->name('create');
    Route::post('{vendor}/store', StoreProduct::class)->name('store');

    Route::get('{product}/modifier', ShowEditProducts::class)->name('edit')->withTrashed();
    Route::put('{product}/update', UpdateProduct::class)->name('update')->withTrashed();
    Route::put('{product}/toggle', \App\Modules\ProductsLogic\Controllers\ToggleProduct::class)->name('toggle')->withTrashed();

    Route::delete('{product}/delete', DeleteProduct::class)->name('delete')->withTrashed();
    Route::put('{product}/restore', \App\Modules\ProductsLogic\Controllers\RestoreProduct::class)->name('restore')->withTrashed();

    //images
    Route::delete('/delete/image/{id}', DeleteImage::class)->name('delete.image')->withTrashed();
    Route::put('/update/image/{id}',UpdateImage::class)->name('update.image')->withTrashed();

    Route::get('{product}/get-images', GetImages::class)->name('get-image')->withTrashed();
    Route::post('{product}/store-images', StoreImages::class)->name('store-image')->withTrashed();

    // import

    Route::post('/store/produit/file/{vendor}', ImportProducts::class)->name('store.file')->withTrashed();

    // export all
    Route::get('/export_all',ExportAllProducts::class)->name('export_all')->withTrashed();


});
