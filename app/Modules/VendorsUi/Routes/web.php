<?php

use App\Modules\VendorsLogic\Controllers\brands\SyncVendorBrands;
use App\Modules\VendorsLogic\Controllers\brands\ToggleVendorBrands;
use App\Modules\VendorsLogic\Controllers\categories\SyncVendorCategories;
use App\Modules\VendorsLogic\Controllers\categories\ToggleVendorCategories;
use App\Modules\VendorsLogic\Controllers\DeleteVendor;
use App\Modules\VendorsLogic\Controllers\images\DeleteVendorImage;
use App\Modules\VendorsLogic\Controllers\images\StoreVendorImage;
use App\Modules\VendorsLogic\Controllers\images\UpdateVendorImage;
use App\Modules\VendorsLogic\Controllers\orders\normal\DeleteOrderVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\EditOrderVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\GenerateCouponVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\ShowCouponPageVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\ShowCreateOrderVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\ShowOrderDetailsVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\StoreOrderVendor;
use App\Modules\VendorsLogic\Controllers\orders\normal\UpdateOrderVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\AddOrderProductVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\DeleteOrderProductVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\DeleteOrderRawVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\GetAddressesVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\GetClientsVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\GetProductsVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\GetRawOrderDetailVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\UpdateOrderRawVendor;
use App\Modules\VendorsLogic\Controllers\orders\raw\UpgradeOrderVendor;
use App\Modules\VendorsLogic\Controllers\orders\ShowUpgradeToOrderVendor;
use App\Modules\VendorsLogic\Controllers\products\DeleteImageVendor;
use App\Modules\VendorsLogic\Controllers\products\DeleteProductVendor;
use App\Modules\VendorsLogic\Controllers\products\GetImagesVendor;
use App\Modules\VendorsLogic\Controllers\products\StoreImagesVendor;
use App\Modules\VendorsLogic\Controllers\products\StoreProductVendor;
use App\Modules\VendorsLogic\Controllers\products\ToggleProductVendor;
use App\Modules\VendorsLogic\Controllers\products\UpdateImageVendor;
use App\Modules\VendorsLogic\Controllers\products\UpdateProductVendor;
use App\Modules\VendorsLogic\Controllers\RestoreVendor;
use App\Modules\VendorsLogic\Controllers\StoreVendor;
use App\Modules\VendorsLogic\Controllers\ToggleVendor;
use App\Modules\VendorsLogic\Controllers\UpdateVendor;
use App\Modules\VendorsLogic\Controllers\users\DeleteVendorUser;
use App\Modules\VendorsLogic\Controllers\users\StoreVendorUser;
use App\Modules\VendorsLogic\Controllers\users\UpdateVendorUser;
use App\Modules\VendorsUi\Controllers\images\GetVendorImage;
use App\Modules\VendorsUi\Controllers\products\ShowCreateProductsVendor;
use App\Modules\VendorsUi\Controllers\products\ShowEditProductsVendor;
use App\Modules\VendorsUi\Controllers\ShowArchivedVendors;
use App\Modules\VendorsUi\Controllers\ShowCreateVendors;
use App\Modules\VendorsUi\Controllers\ShowVendorDetail;
use App\Modules\VendorsUi\Controllers\ShowVendors;
use App\Modules\VendorsUi\Controllers\users\GetVendorUser;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'vendors', 'as' => 'vendors.'], function () {
    //vendors tested
    Route::get('/', ShowVendors::class)->name('index');
    Route::get('archived', ShowArchivedVendors::class)->name('archived');
    Route::get('/create', ShowCreateVendors::class)->name('create');
    Route::post('/store', StoreVendor::class)->name('store');
    Route::get('{vendor}/{type?}/detail', ShowVendorDetail::class)->name('detail');
    Route::put('{vendor}/update', UpdateVendor::class)->name('update');
    Route::put('{vendor}/toggle', ToggleVendor::class)->name('toggle');
    Route::delete('{vendor}/delete', DeleteVendor::class)->name('delete');
    Route::put('{vendor}/restore', RestoreVendor::class)->name('restore')->withTrashed();

    //users tested
    Route::get('{user}/users/get', GetVendorUser::class)->name('users.get');
    Route::delete('{user}/users/delete', DeleteVendorUser::class)->name('users.delete');
    Route::put('{user}/users/update', UpdateVendorUser::class)->name('users.update');
    Route::post('{vendor}/users/store', StoreVendorUser::class)->name('users.store');

    //images tested
    Route::put('{image}/images/update', UpdateVendorImage::class)->name('images.update');
    Route::get('{image}/images/get', GetVendorImage::class)->name('images.get');
    Route::delete('{image}/images/delete', DeleteVendorImage::class)->name('images.delete');
    Route::post('{vendor}/images/store', StoreVendorImage::class)->name('images.store');

    //categories tested
    Route::post('{vendor}/categories/sync', SyncVendorCategories::class)->name('categories.sync');
    Route::put('{category}/categories/toggle', ToggleVendorCategories::class)->name('categories.toggle');
    //brands
    Route::post('{vendor}/brands/sync', SyncVendorBrands::class)->name('brands.sync');
    Route::put('{brand}/brands/toggle', ToggleVendorBrands::class)->name('brands.toggle');

    //products tested
    Route::get('{vendor}/products/create', ShowCreateProductsVendor::class)->name('products.create');
    Route::post('{vendor}products/store', StoreProductVendor::class)->name('products.store');
    Route::get('products/{product}/edit', ShowEditProductsVendor::class)->name('products.edit');
    Route::put('products/{product}/update', UpdateProductVendor::class)->name('products.update');
    Route::put('products/{product}/toggle', ToggleProductVendor::class)->name('products.toggle');
    Route::delete('products/{product}/delete', DeleteProductVendor::class)->name('products.delete');
    Route::delete('products/delete/image/{id}', DeleteImageVendor::class)->name('products.delete.image');
    Route::put('products/update/image/{id}', UpdateImageVendor::class)->name('products.update.image');
    Route::get('products/{product}/get-images', GetImagesVendor::class)->name('products.get-image');
    Route::post('products/{product}/store-images', StoreImagesVendor::class)->name('products.store-image');

    //raw commands tested
    Route::get('raw/getDetail/{order}', GetRawOrderDetailVendor::class)->name('orders.raw.getDetail');
    Route::get('raw/getClients', GetClientsVendor::class)->name('orders.raw.get.clients');
    Route::get('raw/getProducts', GetProductsVendor::class)->name('orders.raw.get.products');
    Route::get('raw/{client}/getAddresses', GetAddressesVendor::class)->name('orders.raw.get.addresses');
    Route::get('raw/{order}/toorder', ShowUpgradeToOrderVendor::class)->name('orders.raw.toorder');
    Route::get('raw/{order}/upgrade', UpgradeOrderVendor::class)->name('orders.raw.upgrade');
    Route::delete('raw/{order_product}/delete', DeleteOrderProductVendor::class)->name('orders.raw.upgrade.product-delete');
    Route::post('raw/{order}/add', AddOrderProductVendor::class)->name('orders.raw.upgrade.product-add');
    Route::put('raw/{order}/update', UpdateOrderRawVendor::class)->name('orders.raw.update');
    Route::delete('raw/{order}/order/delete', DeleteOrderRawVendor::class)->name('orders.raw.delete');

    //commands tested

    Route::get('{vendor}/order/create', ShowCreateOrderVendor::class)->name('orders.create');
    Route::post('{vendor}/order/store', StoreOrderVendor::class)->name('orders.store');
    Route::get('order/{order}/modifier', EditOrderVendor::class)->name('orders.edit');
    Route::put('order/{order}/update', UpdateOrderVendor::class)->name('orders.update');
    Route::get('order/{order}/details', ShowOrderDetailsVendor::class)->name('orders.details');

    // coupon tested
    Route::get('order/{order}/generate-coupon', ShowCouponPageVendor::class)->name('orders.coupons');
    Route::post('order/{order}/generate-coupon/store', GenerateCouponVendor::class)->name('orders.coupons.store');
    Route::delete('order/{order}/delete', DeleteOrderVendor::class)->name('orders.delete');

});
