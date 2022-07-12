<?php

use App\Modules\WebsiteLogic\Controllers\Cart\AddCart;
use App\Modules\WebsiteLogic\Controllers\Cart\DeleteItemCart;
use App\Modules\WebsiteLogic\Controllers\Cart\EditCart;
use App\Modules\WebsiteLogic\Controllers\CheckOut\CheckoutConfirm;
use App\Modules\WebsiteLogic\Controllers\CheckOut\CheckoutProduct;
use App\Modules\WebsiteLogic\Controllers\CheckOut\StoreInfo;
use App\Modules\WebsiteLogic\Controllers\Help\SavePhone;
use App\Modules\WebsiteLogic\Controllers\Help\SetLang;
use App\Modules\WebsiteLogic\Controllers\Profile\DeleteOrder;
use App\Modules\WebsiteLogic\Controllers\Profile\TrackOrder;
use App\Modules\WebsiteLogic\Controllers\Profile\UpdatePassword;
use App\Modules\WebsiteLogic\Controllers\Profile\UpdateProfile;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'','middleware' => ['ChangeLang'] ], function () {
Route::post('{product}/add-to-cart', AddCart::class)->name('add-cart');
Route::post('{product}/delete-item-cart', DeleteItemCart::class)->name('delete-item-cart');
Route::post('{product}/update-item-cart', EditCart::class)->name('update-item-cart');

//store info

Route::post('/store_info', StoreInfo::class)->name('store_info');
Route::post('/track_order', TrackOrder::class)->name('client.track_order');
Route::post('{order}/checkout/store', CheckoutConfirm::class)->name('checkout.confirm');
Route::post('{product}/checkout/product', CheckoutProduct::class)->name('checkout.product');

//client
Route::put('{client}/update/profile', UpdateProfile::class)->name('update.profile');
Route::put('{client}/update/password', UpdatePassword::class)->name('update.password');

Route::delete('{order}/cancel-order', DeleteOrder::class)->name('cancel-order');

// help
Route::post('/help-phone', SavePhone::class)->name('help-phone');

//set lang

Route::post('/SetLang', SetLang::class)->name('SetLang');

});

