<?php


use App\Modules\RulesLogic\Controllers\DeleteCouponRule;
use App\Modules\RulesLogic\Controllers\StoreCouponRule;
use App\Modules\RulesLogic\Controllers\UpdateCouponRule;
use App\Modules\RulesUi\Controllers\ShowCouponRules;
use App\Modules\RulesUi\Controllers\ShowCreateCouponRule;
use App\Modules\RulesUi\Controllers\ShowEditCouponRule;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'coupons-rules', 'as' => 'coupons.rules.'], function () {

    Route::get('/', ShowCouponRules::class)->name('index');

    Route::get('/create', ShowCreateCouponRule::class)->name('create');
    Route::post('/store', StoreCouponRule::class)->name('store');
//////
    Route::get('{rule}/edit', ShowEditCouponRule::class)->name('edit');
    Route::put('{rule}/update', UpdateCouponRule::class)->name('update');
//////
    Route::delete('{rule}/delete', DeleteCouponRule::class)->name('delete');
});
