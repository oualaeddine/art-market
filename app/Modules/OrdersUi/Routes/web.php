<?php

use App\Modules\OrdersLogic\Controllers\DeleteOrder;
use App\Modules\OrdersLogic\Controllers\EditOrder;
use App\Modules\OrdersLogic\Controllers\GenerateCoupon;
use App\Modules\OrdersLogic\Controllers\raw\AddOrderProduct;
use App\Modules\OrdersLogic\Controllers\raw\DeleteOrderProduct;
use App\Modules\OrdersLogic\Controllers\raw\RestoreOrder;
use App\Modules\OrdersLogic\Controllers\raw\UpgradeOrder;
use App\Modules\OrdersLogic\Controllers\StoreOrder;
use App\Modules\OrdersLogic\Controllers\UpdateOrder;
use App\Modules\OrdersUi\Controllers\Coupons\ShowCouponPage;
use App\Modules\OrdersUi\Controllers\GetAddresses;
use App\Modules\OrdersUi\Controllers\GetClients;
use App\Modules\OrdersUi\Controllers\GetOrderDetail;
use App\Modules\OrdersUi\Controllers\GetProducts;
use App\Modules\OrdersUi\Controllers\GetRawOrderDetail;
use App\Modules\OrdersUi\Controllers\ShowArchivedOrders;
use App\Modules\OrdersUi\Controllers\ShowArchivedRawOrders;
use App\Modules\OrdersUi\Controllers\ShowCreateOrder;
use App\Modules\OrdersUi\Controllers\ShowOrderDetails;
use App\Modules\OrdersUi\Controllers\ShowOrders;
use App\Modules\OrdersUi\Controllers\ShowRawOrders;
use App\Modules\OrdersUi\Controllers\ShowUpgradeToOrder;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'commandes', 'as' => 'orders.'], function () {

    Route::get('/', ShowOrders::class)->name('index');
    Route::get('archived', ShowArchivedOrders::class)->name('archived');

    Route::get('/creer', ShowCreateOrder::class)->name('create');
    Route::post('{vendor}/store', StoreOrder::class)->name('store');

    Route::get('/getClients', GetClients::class)->name('get.clients');
    Route::get('/getProducts', GetProducts::class)->name('get.products');

    Route::get('{order}/modifier', EditOrder::class)->name('edit');
    Route::put('{order}/update', UpdateOrder::class)->name('update');
    Route::get('getDetail/{order}', GetOrderDetail::class)->name('getDEtail');

    Route::get('{order}/details', ShowOrderDetails::class)->name('details');

    /// coupon
    Route::get('{order}/generate-coupon', ShowCouponPage::class)->name('coupons');
    Route::post('{order}/generate-coupon/store', GenerateCoupon::class)->name('coupons.store');

    Route::delete('{order}/delete', DeleteOrder::class)->name('delete');
    Route::delete('{order}/restore', \App\Modules\OrdersLogic\Controllers\RestoreOrder::class)->name('restore')->withTrashed();

});

Route::group(['prefix' => 'raw-commandes', 'as' => 'orders.raw.'], function () {

    Route::get('/', ShowRawOrders::class)->name('index');
    Route::get('archived', ShowArchivedRawOrders::class)->name('archived');

    Route::get('getDetail/{order}', GetRawOrderDetail::class)->name('getDetail')->withTrashed();
    Route::get('/getClients', GetClients::class)->name('get.clients');
    Route::get('/getProducts', GetProducts::class)->name('get.products');
    Route::get('{client}/getAddresses', GetAddresses::class)->name('get.addresses');

    Route::get('/{order}/toorder', ShowUpgradeToOrder::class)->name('toorder');
    Route::get('/{order}/upgrade', UpgradeOrder::class)->name('upgrade');

    Route::delete('{order_product}/delete', DeleteOrderProduct::class)->name('upgrade.product-delete');

    Route::post('{order}/add', AddOrderProduct::class)->name('upgrade.product-add');


    Route::put('{order}/update', \App\Modules\OrdersLogic\Controllers\raw\UpdateOrder::class)->name('update');

    Route::delete('{order}/order/delete', \App\Modules\OrdersLogic\Controllers\raw\DeleteOrder::class)->name('delete');
    Route::put('{order}/order/restore', RestoreOrder::class)->name('restore')->withTrashed();

});
