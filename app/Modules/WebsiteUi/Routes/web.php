<?php

use App\Modules\WebsiteLogic\Controllers\Address\DeleteAddress;
use App\Modules\WebsiteLogic\Controllers\Address\UpdateAddress;
use App\Modules\WebsiteLogic\Controllers\Auth\GetCommune;
use App\Modules\WebsiteLogic\Controllers\Auth\LoginAction;
use App\Modules\WebsiteLogic\Controllers\Auth\LogoutAction;
use App\Modules\WebsiteLogic\Controllers\Auth\RegisterAction;
use App\Modules\WebsiteLogic\Controllers\Auth\ResetPassword;
use App\Modules\WebsiteLogic\Controllers\Auth\SendResetSms;
use App\Modules\WebsiteLogic\Controllers\Cart\AddCart;
use App\Modules\WebsiteLogic\Controllers\Cart\DeleteItemCart;
use App\Modules\WebsiteLogic\Controllers\Cart\EditCart;
use App\Modules\WebsiteLogic\Controllers\CheckOut\CheckoutConfirm;
use App\Modules\WebsiteLogic\Controllers\CheckOut\CheckoutProduct;
use App\Modules\WebsiteLogic\Controllers\CheckOut\StoreInfo;
use App\Modules\WebsiteLogic\Controllers\Help\SavePhone;
use App\Modules\WebsiteLogic\Controllers\Help\SetLang;
use App\Modules\WebsiteLogic\Controllers\Profile\DeleteOrder;
use App\Modules\WebsiteLogic\Controllers\Profile\StoreAddress;
use App\Modules\WebsiteLogic\Controllers\Profile\TrackOrder;
use App\Modules\WebsiteLogic\Controllers\Profile\UpdateAvatar;
use App\Modules\WebsiteLogic\Controllers\Profile\UpdatePassword;
use App\Modules\WebsiteLogic\Controllers\Profile\UpdateProfile;
use App\Modules\WebsiteUi\Controllers\Auth\ShowForgetPassword;
use App\Modules\WebsiteUi\Controllers\Auth\ShowLogin;
use App\Modules\WebsiteUi\Controllers\Auth\ShowRegister;
use App\Modules\WebsiteUi\Controllers\Auth\ShowResetPassword;
use App\Modules\WebsiteUi\Controllers\Checkout\ShowCheckoutComplete;
use App\Modules\WebsiteUi\Controllers\Checkout\ShowCheckoutConfirmation;
use App\Modules\WebsiteUi\Controllers\Checkout\ShowCheckoutInfo;
use App\Modules\WebsiteUi\Controllers\Checkout\ShowCheckoutOverView;
use App\Modules\WebsiteUi\Controllers\ShowAbout;
use App\Modules\WebsiteUi\Controllers\ShowAboutUs;
use App\Modules\WebsiteUi\Controllers\ShowAccount;
use App\Modules\WebsiteUi\Controllers\ShowCart;
use App\Modules\WebsiteUi\Controllers\ShowContact;
use App\Modules\WebsiteUi\Controllers\ShowFAQ;
use App\Modules\WebsiteUi\Controllers\ShowHome;
use App\Modules\WebsiteUi\Controllers\ShowPrivacy;
use App\Modules\WebsiteUi\Controllers\ShowProductPage;
use App\Modules\WebsiteUi\Controllers\ShowShop;
use App\Modules\WebsiteUi\Controllers\ShowTermsAndConditions;
use App\Modules\WebsiteUi\Controllers\ShowTrackOrder;
use App\Modules\WebsiteUi\Controllers\ShowVendorDetail;
use App\Modules\WebsiteUi\Controllers\ShowVendors;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '', 'middleware' => ['ChangeLang']], function () {

    Route::get('', ShowHome::class)->name('index');
    Route::get('product/{product:slug}', ShowProductPage::class)->name('product');
    Route::get('checkout-info', ShowCheckoutInfo::class)->name('checkout');
    Route::get('checkout-confirmation', ShowCheckoutConfirmation::class)->name('checkout.confirmation');
    Route::get('{order}/checkout-complete', ShowCheckoutComplete::class)->name('checkout.complete');

    //  Route::get('/blog', ShowBlog::class)->name('blog');
    Route::get('shop', ShowShop::class)->name('shop');
    Route::get('vendors', ShowVendors::class)->name('vendors');
    Route::get('vendor/{vendor:name_fr}', ShowVendorDetail::class)->name('vendor-detail');

//    Route::get('/about', ShowAbout::class)->name('about');
    Route::get('/contact', ShowContact::class)->name('contact');
    Route::get('/cart', ShowCart::class)->name('cart');

    Route::get('/order-tracking', ShowTrackOrder::class)->name('order-tracking');
    Route::get('/GetCommune/{id}', GetCommune::class)->name('get.commune');

    //auth
    Route::group(['prefix' => '', 'as' => 'client.'], function () {

        Route::get('account', ShowAccount::class)->name('account')->middleware('auth:client');
        Route::get('login', ShowLogin::class)->name('login');
        Route::post('login', LoginAction::class)->name('login.action');
        Route::post('register', RegisterAction::class)->name('register.action');
        Route::post('logout', LogoutAction::class)->name('logout.action')->middleware('auth:client');
        Route::get('register', ShowRegister::class)->name('register');


        Route::get('forgetpassword', ShowForgetPassword::class)->name('forget-password');
        Route::post('forgetpassword', SendResetSms::class)->name('forget-password.action');
        Route::get('resetpassword/{token}', ShowResetPassword::class)->name('reset.password.get');
        Route::post('resetpassword', ResetPassword::class)->name('reset-password.action');


        Route::post('address/store', StoreAddress::class)->name('store.address')->middleware('auth:client');
        Route::put('update/profile', UpdateProfile::class)->name('update.profile')->middleware('auth:client');
        Route::put('update/avatar', UpdateAvatar::class)->name('update.avatar')->middleware('auth:client');
        Route::put('{client}/update/password', UpdatePassword::class)->name('update.password')->middleware('auth:client');

        Route::put('{client_address}/address/update', UpdateAddress::class)->name('update.address')->middleware('auth:client');
        Route::delete('{client_address}/address/delete', DeleteAddress::class)->name('delete.address')->middleware('auth:client');


    });


    Route::get('faq', ShowFAQ::class)->name('faq');
    Route::get('terms-and-conditions', ShowTermsAndConditions::class)->name('terms_conditions');
    Route::get('privacy', ShowPrivacy::class)->name('privacy');
    Route::get('/faq', ShowFAQ::class)->name('faq');
    Route::get('/terms-and-conditions', ShowTermsAndConditions::class)->name('terms_conditions');
    Route::get('/about', ShowAbout::class)->name('about');


    Route::post('{product}/add-to-cart', AddCart::class)->name('add-cart');
    Route::post('{product}/delete-item-cart', DeleteItemCart::class)->name('delete-item-cart');
    Route::post('{product}/update-item-cart', EditCart::class)->name('update-item-cart');

//store info

    Route::post('/store_info', StoreInfo::class)->name('store_info');
    Route::post('/track_order', TrackOrder::class)->name('client.track_order');
    Route::post('{order}/checkout/store', CheckoutConfirm::class)->name('checkout.confirm');
    Route::post('{product}/checkout/product', CheckoutProduct::class)->name('checkout.product');

//client


    Route::delete('{order}/cancel-order', DeleteOrder::class)->name('cancel-order');

// help
    Route::post('/help-phone', SavePhone::class)->name('help-phone');

//set lang

    Route::post('/SetLang', SetLang::class)->name('SetLang');


});


