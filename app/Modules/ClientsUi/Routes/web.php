<?php

use App\Modules\ClientsLogic\Controllers\Client\ArchiveClient;
use App\Modules\ClientsLogic\Controllers\Client\DeleteClient;
use App\Modules\ClientsLogic\Controllers\Client\GetClient;
use App\Modules\ClientsLogic\Controllers\Client\RestoreClient;
use App\Modules\ClientsLogic\Controllers\Client\StoreClient;
use App\Modules\ClientsLogic\Controllers\Client\UpdateClientDetail;
use App\Modules\ClientsLogic\Controllers\ClientAddress\DeleteClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\GetClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\RestoreClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\StoreClientAddress;
use App\Modules\ClientsLogic\Controllers\ClientAddress\UpdateClientAddress;
use App\Modules\ClientsLogic\Controllers\Contact\DeleteContact;
use App\Modules\ClientsLogic\Controllers\Contact\EditContact;
use App\Modules\ClientsLogic\Controllers\Contact\RestoreContact;
use App\Modules\ClientsLogic\Controllers\Contact\UpdateContact;
use App\Modules\ClientsLogic\Controllers\Coupon\AssignClientCoupon;
use App\Modules\ClientsLogic\Controllers\Coupon\DeleteClientCoupon;
use App\Modules\ClientsLogic\Controllers\Coupon\GetFamilies;
use App\Modules\ClientsLogic\Controllers\Coupon\RestoreClientCoupon;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialInformation;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialPhoto;
use App\Modules\ClientsLogic\Controllers\Special\UpdateClientSpecialTelephone;
use App\Modules\ClientsUi\Controllers\Contact\ShowArchivedContacts;
use App\Modules\ClientsUi\Controllers\Contact\ShowContacts;
use App\Modules\ClientsUi\Controllers\GetCommune;
use App\Modules\ClientsUi\Controllers\GetCommuneWithWilaya;
use App\Modules\ClientsUi\Controllers\ShowArchivedClients;
use App\Modules\ClientsUi\Controllers\ShowClientArchivedAddressesl;
use App\Modules\ClientsUi\Controllers\ShowClientArchivedCoupons;
use App\Modules\ClientsUi\Controllers\ShowClientCreate;
use App\Modules\ClientsUi\Controllers\ShowClientDetails;
use App\Modules\ClientsUi\Controllers\ShowClientEdit;
use App\Modules\ClientsUi\Controllers\ShowClients;
use App\Modules\ClientsUi\Controllers\ShowClientSpecial;
use Illuminate\Support\Facades\Route;

/* use App\Modules\ClientsLogic\Controllers\Client\UpdateClient; */


Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {

    Route::get('/', ShowClients::class)->name('index');
    Route::get('archived', ShowArchivedClients::class)->name('archived');

    Route::get('/details/{id}', ShowClientDetails::class)->name('details');


    Route::get('/modifier/{id}', ShowClientEdit::class)->name('edit');
    /*   Route::put('{client}/update', UpdateClient::class)->name('update'); */
    Route::put('{client}/update/update', UpdateClientDetail::class)->name('update-detail');


    Route::get('/creer', ShowClientCreate::class)->name('create');
    Route::post('/store', StoreClient::class)->name('store');


    Route::get('/commune/{id}', GetCommune::class)->name('get.commune');
    Route::get('/commune-with-wilaya', GetCommuneWithWilaya::class)->name('get.commune_wilaya');


    Route::delete('{client}/delete', DeleteClient::class)->name('delete')->withTrashed();
    Route::delete('{client}/archive', ArchiveClient::class)->name('archive');
    Route::put('{client}/restore', RestoreClient::class)->name('restore')->withTrashed();


    //
    Route::get('{client}/client/info', GetClient::class)->name('get.info');

    Route::get('{client}/detail', ShowClientSpecial::class)->name('special');
    Route::get('{client}/archived/addresses', ShowClientArchivedAddressesl::class)->name('archived.addresses');
    Route::get('{client}/archived/coupons', ShowClientArchivedCoupons::class)->name('archived.coupons');
    Route::put('{client_coupon}/coupon/restore', RestoreClientCoupon::class)->name('coupon.restore')->withTrashed();
    Route::get('getFamilies', GetFamilies::class)->name('get.families');
    Route::post('{client}/coupon/assign', AssignClientCoupon::class)->name('coupon.assign');

    Route::delete('{coupon}/coupon/unassign', DeleteClientCoupon::class)->name('coupon.unassign');

});

Route::group(['prefix' => 'clients-profile', 'as' => 'client-profile.'], function () {

    Route::put('{client}/update/special/info', UpdateClientSpecialInformation::class)->name('update-special-info');
    Route::put('{client}/update/special/tele', UpdateClientSpecialTelephone::class)->name('update-special-tele');
    Route::put('{client}/update/special/avatar', UpdateClientSpecialPhoto::class)->name('update-special-avatar');
});


Route::group(['prefix' => 'clients-address', 'as' => 'client-address.'], function () {

    Route::post('{client}/store', StoreClientAddress::class)->name('store');
    Route::put('{client_address}/restore', RestoreClientAddress::class)->name('restore')->withTrashed();

    Route::delete('{client_address}/delete', DeleteClientAddress::class)->name('delete');
    Route::get('{client_address}', GetClientAddress::class)->name('get');
    Route::put('{client_address}/update', UpdateClientAddress::class)->name('update');

});

Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {

    Route::get('/', ShowContacts::class)->name('index');
    Route::get('archived', ShowArchivedContacts::class)->name('archived');
    Route::delete('{contact}/archive', DeleteContact::class)->name('archive');
    Route::put('{contact}/restore', RestoreContact::class)->name('restore')->withTrashed();
    Route::delete('{contact}/delete', DeleteContact::class)->name('delete');
    Route::get('{contact}', EditContact::class)->name('edit');
    Route::put('{contact}/update', UpdateContact::class)->name('update');

});

